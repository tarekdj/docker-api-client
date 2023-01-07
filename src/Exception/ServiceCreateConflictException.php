<?php

namespace Tarekdj\Docker\ApiClient\Exception;

class ServiceCreateConflictException extends ConflictException
{
    /**
     * @var \Tarekdj\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('name conflicts with an existing service');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Tarekdj\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}