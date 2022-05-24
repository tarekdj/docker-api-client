<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class PluginEnable extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $name;
    /**
    * 
    *
    * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
    default if omitted.
    
    * @param array $queryParameters {
    *     @var int $timeout Set the HTTP client timeout (in seconds)
    * }
    */
    public function __construct(string $name, array $queryParameters = array())
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/plugins/{name}/enable');
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
        $optionsResolver->setDefined(array('timeout'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('timeout' => 0));
        $optionsResolver->setAllowedTypes('timeout', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\PluginEnableNotFoundException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\PluginEnableInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\PluginEnableNotFoundException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\PluginEnableInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}