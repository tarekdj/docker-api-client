<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class ContainerStart extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * 
    *
    * @param string $id ID or name of the container
    * @param array $queryParameters {
    *     @var string $detachKeys Override the key sequence for detaching a container. Format is a
    single character `[a-Z]` or `ctrl-<value>` where `<value>` is one
    of: `a-z`, `@`, `^`, `[`, `,` or `_`.
    
    * }
    */
    public function __construct(string $id, array $queryParameters = array())
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/containers/{id}/start');
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
        $optionsResolver->setDefined(array('detachKeys'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('detachKeys', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStartNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ContainerStartInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (204 === $status) {
            return null;
        }
        if (304 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ContainerStartNotFoundException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ContainerStartInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}