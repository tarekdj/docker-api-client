<?php

namespace TestContainersPHP\Docker\ApiClient\Exception;

class TaskLogsNotFoundException extends NotFoundException
{
    /**
     * @var \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('no such task');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}