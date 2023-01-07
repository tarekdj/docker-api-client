<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class SwarmInit extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SwarmInitPostBody $body 
     */
    public function __construct(\Tarekdj\Docker\ApiClient\Model\SwarmInitPostBody $body)
    {
        $this->body = $body;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/swarm/init';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitBadRequestException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmInitServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return json_decode($body);
        }
        if (400 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmInitBadRequestException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmInitInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmInitServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}