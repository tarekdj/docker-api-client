<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class ConfigUpdate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * 
    *
    * @param string $id The ID or name of the config
    * @param \TestContainersPHP\Docker\ApiClient\Model\ConfigSpec $body The spec of the config to update. Currently, only the Labels field
    can be updated. All other fields must remain unchanged from the
    [ConfigInspect endpoint](#operation/ConfigInspect) response values.
    
    * @param array $queryParameters {
    *     @var int $version The version number of the config object being updated. This is
    required to avoid conflicting writes.
    
    * }
    */
    public function __construct(string $id, \TestContainersPHP\Docker\ApiClient\Model\ConfigSpec $body, array $queryParameters = array())
    {
        $this->id = $id;
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
        return str_replace(array('{id}'), array($this->id), '/configs/{id}/update');
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
        $optionsResolver->setDefined(array('version'));
        $optionsResolver->setRequired(array('version'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('version', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateBadRequestException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateInternalServerErrorException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateBadRequestException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ConfigUpdateServiceUnavailableException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}