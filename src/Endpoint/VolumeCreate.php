<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class VolumeCreate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \TestContainersPHP\Docker\ApiClient\Model\VolumeCreateOptions $volumeConfig Volume configuration
     */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\VolumeCreateOptions $volumeConfig)
    {
        $this->body = $volumeConfig;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/volumes/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\VolumeCreateInternalServerErrorException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\Volume
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\Volume', 'json');
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\VolumeCreateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}