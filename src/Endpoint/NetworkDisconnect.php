<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class NetworkDisconnect extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id Network ID or name
     * @param \Tarekdj\Docker\ApiClient\Model\NetworksIdDisconnectPostBody $container 
     */
    public function __construct(string $id, \Tarekdj\Docker\ApiClient\Model\NetworksIdDisconnectPostBody $container)
    {
        $this->id = $id;
        $this->body = $container;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/networks/{id}/disconnect');
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
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectForbiddenException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return null;
        }
        if (403 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectForbiddenException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (404 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectNotFoundException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\NetworkDisconnectInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}