<?php

namespace TestContainersPHP\Docker\ApiClient\Exception;

class NetworkCreateNotFoundException extends NotFoundException
{
    /**
     * @var \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('plugin not found');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}