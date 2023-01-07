<?php

namespace Tarekdj\Docker\ApiClient\Endpoint;

class TaskInspect extends \Tarekdj\Docker\ApiClient\Runtime\Client\BaseEndpoint implements \Tarekdj\Docker\ApiClient\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID of the task
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Tarekdj\Docker\ApiClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{id}'), array($this->id), '/tasks/{id}');
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
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectNotFoundException
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectInternalServerErrorException
     * @throws \Tarekdj\Docker\ApiClient\Exception\TaskInspectServiceUnavailableException
     *
     * @return null|\Tarekdj\Docker\ApiClient\Model\Task
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\Task', 'json');
        }
        if (404 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\TaskInspectNotFoundException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (500 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\TaskInspectInternalServerErrorException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
        if (503 === $status) {
            throw new \Tarekdj\Docker\ApiClient\Exception\TaskInspectServiceUnavailableException($serializer->deserialize($body, 'Tarekdj\\Docker\\ApiClient\\Model\\ErrorResponse', 'json'));
        }
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}