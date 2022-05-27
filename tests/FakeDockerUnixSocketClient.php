<?php

use Http\Client\HttpClient;

final class FakeDockerUnixSocketClient implements HttpClient {

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
        $response = new \GuzzleHttp\Psr7\Response(200, [], $parsed['body']);

        return $response;
    }
}
