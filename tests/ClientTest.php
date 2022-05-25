<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use TestContainersPHP\Docker\ApiClient\Client;

class Response implements \Psr\Http\Message\ResponseInterface {
    protected $data;
    public function __construct(string $data = '') {
        $this->data = $data;
    }

    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
    }

    public function getHeader($name)
    {
        // TODO: Implement getHeader() method.
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function getBody()
    {
        return $this->data;
    }

    public function withBody(\Psr\Http\Message\StreamInterface $body)
    {
        // TODO: Implement withBody() method.
    }

    public function getStatusCode()
    {
        return 200;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        // TODO: Implement withStatus() method.
    }

    public function getReasonPhrase()
    {
        // TODO: Implement getReasonPhrase() method.
    }
}

final class DockerUnixSocketCLient implements \Http\Client\HttpClient {

    const ADDRESS = "unix:///var/run/docker.sock";
    const HOST = 'localhost';

    protected function parseResponse(string $data): array
    {
        $explodedData = array_filter(explode("\n", $data), function ($line) {
            return $line != '';
        });
        $body = end($explodedData);
        return [
            'body' => $body,
        ];
    }

    public function sendRequest(\Psr\Http\Message\RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        $fp = stream_socket_client(self::ADDRESS, $errno, $errstr, 30);
        if (!$fp) {
            echo "$errstr ($errno)<br />\n";
        } else {
            $host = self::HOST;
            fwrite($fp, "{$request->getMethod()} {$request->getUri()->getPath()} HTTP/1.0\r\nHost: {$host}\r\nAccept: */*\r\n\r\n");
            $resp = '';
            while (!feof($fp)) {
                $resp .= fgets($fp, 1024);
            }
            fclose($fp);
        }
        $parsed = $this->parseResponse($resp);

        return new Response($parsed['body']);
    }
}


final class ClientTest extends TestCase
{
    public function testClientCreated(): void
    {
        $socketClient = new DockerUnixSocketCLient();
        $docker = Client::create($socketClient);
        $this->assertTrue($docker instanceof Client);

        $helloWorldImage = array_filter($docker->imageList(), function ($image) {
            return ($image->getRepoTags())[0] === "hello-world:latest";
        });
        $this->assertCount(1, $helloWorldImage, "Pulled hello-world image found.");
    }
}
