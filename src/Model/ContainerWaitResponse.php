<?php

namespace Tarekdj\Docker\ApiClient\Model;

class ContainerWaitResponse
{
    /**
     * Exit code of the container
     *
     * @var int|null
     */
    protected $statusCode;
    /**
     * container waiting error, if any
     *
     * @var ContainerWaitExitError|null
     */
    protected $error;
    /**
     * Exit code of the container
     *
     * @return int|null
     */
    public function getStatusCode() : ?int
    {
        return $this->statusCode;
    }
    /**
     * Exit code of the container
     *
     * @param int|null $statusCode
     *
     * @return self
     */
    public function setStatusCode(?int $statusCode) : self
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    /**
     * container waiting error, if any
     *
     * @return ContainerWaitExitError|null
     */
    public function getError() : ?ContainerWaitExitError
    {
        return $this->error;
    }
    /**
     * container waiting error, if any
     *
     * @param ContainerWaitExitError|null $error
     *
     * @return self
     */
    public function setError(?ContainerWaitExitError $error) : self
    {
        $this->error = $error;
        return $this;
    }
}