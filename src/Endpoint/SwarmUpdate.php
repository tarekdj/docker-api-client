<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class SwarmUpdate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param \TestContainersPHP\Docker\ApiClient\Model\SwarmSpec $body 
    * @param array $queryParameters {
    *     @var int $version The version number of the swarm object being updated. This is
    required to avoid conflicting writes.
    
    *     @var bool $rotateWorkerToken Rotate the worker join token.
    *     @var bool $rotateManagerToken Rotate the manager join token.
    *     @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
    * }
    */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\SwarmSpec $body, array $queryParameters = array())
    {
        $this->body = $body;
        $this->queryParameters = $queryParameters;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/swarm/update';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('version', 'rotateWorkerToken', 'rotateManagerToken', 'rotateManagerUnlockKey'));
        $optionsResolver->setRequired(array('version'));
        $optionsResolver->setDefaults(array('rotateWorkerToken' => false, 'rotateManagerToken' => false, 'rotateManagerUnlockKey' => false));
        $optionsResolver->setAllowedTypes('version', array('int'));
        $optionsResolver->setAllowedTypes('rotateWorkerToken', array('bool'));
        $optionsResolver->setAllowedTypes('rotateManagerToken', array('bool'));
        $optionsResolver->setAllowedTypes('rotateManagerUnlockKey', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateBadRequestException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateInternalServerErrorException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateBadRequestException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\SwarmUpdateServiceUnavailableException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}