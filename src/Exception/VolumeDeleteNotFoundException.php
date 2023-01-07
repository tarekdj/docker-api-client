<?php

namespace Tarekdj\Docker\ApiClient\Exception;

class VolumeDeleteNotFoundException extends NotFoundException
{
    /**
     * @var \Tarekdj\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('No such volume or volume driver');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Tarekdj\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}