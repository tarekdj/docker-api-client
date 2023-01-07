<?php

namespace Tarekdj\Docker\ApiClient\Model;

class ContainerSummaryHostConfig
{
    /**
     * 
     *
     * @var string|null
     */
    protected $networkMode;
    /**
     * 
     *
     * @return string|null
     */
    public function getNetworkMode() : ?string
    {
        return $this->networkMode;
    }
    /**
     * 
     *
     * @param string|null $networkMode
     *
     * @return self
     */
    public function setNetworkMode(?string $networkMode) : self
    {
        $this->networkMode = $networkMode;
        return $this;
    }
}