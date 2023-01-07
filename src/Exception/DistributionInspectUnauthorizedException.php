<?php

namespace Tarekdj\Docker\ApiClient\Exception;

class DistributionInspectUnauthorizedException extends UnauthorizedException
{
    /**
     * @var \Tarekdj\Docker\ApiClient\Model\ErrorResponse
     */
    private $errorResponse;
    public function __construct(\Tarekdj\Docker\ApiClient\Model\ErrorResponse $errorResponse)
    {
        parent::__construct('Failed authentication or no image found');
        $this->errorResponse = $errorResponse;
    }
    public function getErrorResponse() : \Tarekdj\Docker\ApiClient\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
}