<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class ImageCommit extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\ContainerConfig $containerConfig The container configuration
     * @param array $queryParameters {
     *     @var string $container The ID or name of the container to commit
     *     @var string $repo Repository name for the created image
     *     @var string $tag Tag name for the create image
     *     @var string $comment Commit message
     *     @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     *     @var bool $pause Whether to pause the container before committing
     *     @var string $changes `Dockerfile` instructions to apply while committing
     * }
     */
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ContainerConfig $containerConfig, array $queryParameters = array())
    {
        $this->body = $containerConfig;
        $this->queryParameters = $queryParameters;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/commit';
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
        $optionsResolver->setDefined(array('container', 'repo', 'tag', 'comment', 'author', 'pause', 'changes'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array('pause' => true));
        $optionsResolver->addAllowedTypes('container', array('string'));
        $optionsResolver->addAllowedTypes('repo', array('string'));
        $optionsResolver->addAllowedTypes('tag', array('string'));
        $optionsResolver->addAllowedTypes('comment', array('string'));
        $optionsResolver->addAllowedTypes('author', array('string'));
        $optionsResolver->addAllowedTypes('pause', array('bool'));
        $optionsResolver->addAllowedTypes('changes', array('string'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCommitNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\ImageCommitInternalServerErrorException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\IdResponse
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\IdResponse', 'json');
        }
        if (404 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ImageCommitNotFoundException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\ImageCommitInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}