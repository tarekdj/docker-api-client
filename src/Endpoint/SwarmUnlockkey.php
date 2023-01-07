<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class SwarmUnlockkey extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/swarm/unlockkey';
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\SwarmUnlockkeyGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\SwarmUnlockkeyGetResponse200', 'json');
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\SwarmUnlockkeyServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}