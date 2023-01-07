<?php

namespace Tarekdj\Docker\ApiClient\Exception;

class NetworkCreateNotFoundException extends NotFoundException
{
    /**
     * @var \Tarekdj\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('plugin not found');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Tarekdj\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}