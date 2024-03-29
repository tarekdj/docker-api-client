<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class ImageDelete extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $name;
    /**
    * Remove an image, along with any untagged parent images that were
    referenced by that image.
    
    Images can't be removed if they have descendant images, are being
    used by a running container or are being used by a build.
    
    *
    * @param string $name Image name or ID
    * @param array $queryParameters {
    *     @var bool $force Remove the image even if it is being used by stopped containers or has other tags
    *     @var bool $noprune Do not delete untagged parent images
    * }
    */
    public function __construct(string $name, array $queryParameters = array())
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'DELETE';
    }
    public function getUri() : string
    {
        return str_replace(array('{name}'), array($this->name), '/images/{name}');
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
        $optionsResolver->setDefined(array('force', 'noprune'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('force' => false, 'noprune' => false));
        $optionsResolver->addAllowedTypes('force', array('bool'));
        $optionsResolver->addAllowedTypes('noprune', array('bool'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteConflictException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageDeleteInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\ImageDeleteResponseItem[]
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ImageDeleteResponseItem[]', 'json');
        }
        if (404 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ImageDeleteNotFoundException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (409 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ImageDeleteConflictException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ImageDeleteInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}