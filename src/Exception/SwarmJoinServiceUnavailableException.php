<?php

namespace TestContainersPHP\Docker\ApiClient\Exception;

class SwarmJoinServiceUnavailableException extends ServiceUnavailableException
{
    /**
     * @var \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('node is already part of a swarm');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}