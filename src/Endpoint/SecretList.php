<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class SecretList extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param array $queryParameters {
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
    process on the secrets list.
    
    Available filters:
    
    - `id=<secret id>`
    - `label=<key> or label=<key>=value`
    - `name=<secret name>`
    - `names=<secret name>`
    
    * }
    */
    public function __construct(array $queryParameters = array())
    {
        $this->queryParameters = $queryParameters;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/secrets';
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
        $optionsResolver->setDefined(array('filters'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->setAllowedTypes('filters', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretListInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SecretListServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Secret[]
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\Secret[]', 'json');
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SecretListInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SecretListServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}