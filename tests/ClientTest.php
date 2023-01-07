<?php declare(strict_types=1);

require_once __DIR__ . '/FakeDockerUnixSocketClient.php';

use PHPUnit\Framework\TestCase;


final class ClientTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        echo "\n";
        echo "🐋 Pull hello-world:latest ";
        shell_exec('docker pull hello-world:latest');
    }

    public function testClientCreated(): void
    {
        $socketClient = new FakeDockerUnixSocketClient();
        $docker = \Tarekdj\Docker\ApiClient\Client::create($socketClient);
        $this->assertTrue($docker instanceof Client);
        $this->assertTrue($this->imageFound('hello-world:latest', $docker->imageList()), 'Pulled hello-world image found.');
        $docker->imageDelete('hello-world');
        $this->assertFalse($this->imageFound('hello-world:latest', $docker->imageList()), 'Pulled hello-world image removed.');
    }

    private function imageFound(string $imageName = '', array $imagesList = []): bool
    {
        return count(array_filter($imagesList, function ($image) use ($imageName, $imagesList) {
                return ($image->getRepoTags())[0] === $imageName;
            })) > 0;
    }
}
