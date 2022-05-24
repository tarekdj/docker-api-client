<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class ContainerExec extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Run a command inside a running container.
     *
     * @param string $id ID or name of container
     * @param \TestContainersPHP\Docker\ApiClient\Model\ContainersIdExecPostBody $execConfig Exec configuration
     */
    public function __construct(string $id, \TestContainersPHP\Docker\ApiClient\Model\ContainersIdExecPostBody $execConfig)
    {
        $this->id = $id;
        $this->body = $execConfig;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/exec');
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
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecConflictException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecInternalServerErrorException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\IdResponse', 'json');
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecConflictException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerExecInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}