<?php declare(strict_types=1);

use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\ContentLengthPlugin;
use Http\Client\Common\Plugin\DecoderPlugin;
use Http\Client\Common\PluginClientFactory;
use Http\Client\Socket\Client  as SocketClient;
use Nyholm\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use TestContainersPHP\Docker\ApiClient\Client;

final class ClientTest extends TestCase
{
    public function testClientCreated(): void
    {

        $config = ['remote_socket' => 'unix:///var/run/docker.sock'];

        $socketClient = new SocketClient($config);
        $pluginClientFactory = new PluginClientFactory();

        $httpSocketClient = $pluginClientFactory->createClient($socketClient, [
            new ContentLengthPlugin(),
            new DecoderPlugin(),
            new AddHostPlugin(new Uri('http://localhost')),
        ], [
            'client_name' => 'docker-client',
        ]);

        $docker = Client::create($httpSocketClient);
        $this->assertTrue($docker instanceof Client);

        $helloWorldImage = array_filter($docker->imageList(), function ($image) {
            return ($image->getRepoTags())[0] === "hello-world:latest";
        });
        $this->assertCount(1, $helloWorldImage, "Pulled hello-world image found.");
    }
}
