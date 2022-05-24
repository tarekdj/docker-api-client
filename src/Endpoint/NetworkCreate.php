<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class NetworkCreate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \TestContainersPHP\Docker\ApiClient\Model\NetworksCreatePostBody $networkConfig Network configuration
     */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\NetworksCreatePostBody $networkConfig)
    {
        $this->body = $networkConfig;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/networks/create';
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
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateForbiddenException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateInternalServerErrorException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\NetworksCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\NetworksCreatePostResponse201', 'json');
        }
        if (403 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateForbiddenException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\NetworkCreateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}