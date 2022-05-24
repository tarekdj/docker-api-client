<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class SecretCreate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \TestContainersPHP\Docker\ApiClient\Model\SecretsCreatePostBody $body 
     */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\SecretsCreatePostBody $body)
    {
        $this->body = $body;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/secrets/create';
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
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateConflictException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateInternalServerErrorException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateServiceUnavailableException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\IdResponse', 'json');
        }
        if (409 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateConflictException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SecretCreateServiceUnavailableException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}