<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class SystemAuth extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.
    
    *
    * @param \TestContainersPHP\Docker\ApiClient\Model\AuthConfig $authConfig Authentication to check
    */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\AuthConfig $authConfig)
    {
        $this->body = $authConfig;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/auth';
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
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SystemAuthInternalServerErrorException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\AuthPostResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\AuthPostResponse200', 'json');
        }
        if (204 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SystemAuthInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}