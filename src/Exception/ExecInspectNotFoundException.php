<?php

namespace TestContainersPHP\Docker\ApiClient\Exception;

class ExecInspectNotFoundException extends NotFoundException
{
    /**
     * @var \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\TestContainersPHP\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('No such exec instance');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \TestContainersPHP\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}