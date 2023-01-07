<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class ServiceCreate extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param \Tarekdj\Docker\ApiClient\Model\ServicesCreatePostBody $body 
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    */
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ServicesCreatePostBody $body, array $headerParameters = array())
    {
        $this->body = $body;
        $this->headerParameters = $headerParameters;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/services/create';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
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
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ServiceCreateServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ServicesCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ServicesCreatePostResponse201', 'json');
        }
        if (400 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ServiceCreateBadRequestException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (403 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ServiceCreateForbiddenException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ServiceCreateConflictException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ServiceCreateInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ServiceCreateServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}