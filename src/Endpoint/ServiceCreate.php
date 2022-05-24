<?php

namespace TestContainersPHP\Docker\ApiClient\Endpoint;

class ServiceCreate extends \TestContainersPHP\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \TestContainersPHP\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
    * 
    *
    * @param \TestContainersPHP\Docker\ApiClient\Model\ServicesCreatePostBody $body 
    * @param array $headerParameters {
    *     @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
    registries.
    
    Refer to the [authentication section](#section/Authentication) for
    details.
    
    * }
    */
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\ServicesCreatePostBody $body, array $headerParameters = array())
    {
        $this->body = $body;
        $this->headerParameters = $headerParameters;
    }
    use \TestContainersPHP\Docker\ApiClient\Runtime\Client\EndpointTrait;
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
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateBadRequestException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateForbiddenException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateConflictException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateInternalServerErrorException
     * @throws \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateServiceUnavailableException
     *
     * @return null|\TestContainersPHP\Docker\ApiClient\Model\ServicesCreatePostResponse201
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ServicesCreatePostResponse201', 'json');
        }
        if (400 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateBadRequestException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (403 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateForbiddenException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateConflictException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateInternalServerErrorException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \TestContainersPHP\Docker\ApiClient\Exception\ServiceCreateServiceUnavailableException($serializer->deserialize($body, 'TestContainersPHP\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}