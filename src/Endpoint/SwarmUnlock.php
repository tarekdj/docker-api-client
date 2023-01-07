<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class SwarmUnlock extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Tarekdj\Docker\ApiClient\Model\SwarmUnlockPostBody $body 
     */
    public function __construct(\Tarekdj\Docker\ApiClient\Model\SwarmUnlockPostBody $body)
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
        return '/swarm/unlock';
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
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockServiceUnavailableException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}