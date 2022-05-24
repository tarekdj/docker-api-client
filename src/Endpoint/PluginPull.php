<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class PluginPull extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * Pulls and installs a plugin. After the plugin is installed, it can be
    enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).
    
    *
    * @param \TestContainersPHP\Docker\ApiClient\Model\PluginPrivilege[] $body 
    * @param array $queryParameters {
    *     @var string $remote Remote reference for plugin to install.
    
    The `:latest` tag is optional, and is used as the default if omitted.
    
    *     @var string $name Local name for the pulled plugin.
    
    The `:latest` tag is optional, and is used as the default if omitted.
    
    * }
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration to use when pulling a plugin
    from a registry.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    */
    public function __construct(array $body, array $queryParameters = array(), array $headerParameters = array())
    {
        $this->body = $body;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/plugins/pull';
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
        $optionsResolver->setDefined(array('remote', 'name'));
        $optionsResolver->setRequired(array('remote'));
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('remote', array('string'));
        $optionsResolver->setAllowedTypes('name', array('string'));
        return $optionsResolver;
    }
    protected function getHeadersOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(array('X-Registry-Auth'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('X-Registry-Auth', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\PluginPullInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (204 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\PluginPullInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}