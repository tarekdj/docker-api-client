<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class ContainerExport extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id ID or name of the container
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/export');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerExportNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ContainerExportInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerExportNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ContainerExportInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}