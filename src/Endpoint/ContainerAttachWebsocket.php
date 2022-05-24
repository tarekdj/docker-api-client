<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class ContainerAttachWebsocket extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * 
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $detachKeys Override the key sequence for detaching a container.Format is a single
    character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
    `@`, `^`, `[`, `,`, or `_`.
    
    *     @var bool $logs Return logs
    *     @var bool $stream Return stream
    * }
    */
    public function __construct(string $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/attach/ws');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('detachKeys', 'logs', 'stream'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('logs' => false, 'stream' => false));
        $optionsResolver->setAllowedTypes('detachKeys', array('string'));
        $optionsResolver->setAllowedTypes('logs', array('bool'));
        $optionsResolver->setAllowedTypes('stream', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketBadRequestException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (101 === $status) {
            return null;
        }
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketBadRequestException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerAttachWebsocketInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}