<?php

namespace Tarekdj\Docker\ApiClient\Model;

class ServiceEndpointVirtualIPsItem
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var string|null
     */
    protected $networkID;
    /**
     * 
     *
     * @var string|null
     */
    protected $addr;
    /**
     * 
     *
     * @return string|null
     */
    public function getNetworkID() : ?string
    {
        return $this->networkID;
    }
    /**
     * 
     *
     * @param string|null $networkID
     *
     * @return self
     */
    public function setNetworkID(?string $networkID) : self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAddr() : ?string
    {
        return $this->addr;
    }
    /**
     * 
     *
     * @param string|null $addr
     *
     * @return self
     */
    public function setAddr(?string $addr) : self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;
        return $this;
    }
}