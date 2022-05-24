<?php

namespace TestContainersPHP\Docker\ApiClient\Model;

class IPAMConfig
{
    /**
     * 
     *
     * @var string|null
     */
    protected $subnet;
    /**
     * 
     *
     * @var string|null
     */
    protected $iPRange;
    /**
     * 
     *
     * @var string|null
     */
    protected $gateway;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $auxiliaryAddresses;
    /**
     * 
     *
     * @return string|null
     */
    public function getSubnet() : ?string
    {
        return $this->subnet;
    }
    /**
     * 
     *
     * @param string|null $subnet
     *
     * @return self
     */
    public function setSubnet(?string $subnet) : self
    {
        $this->subnet = $subnet;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getIPRange() : ?string
    {
        return $this->iPRange;
    }
    /**
     * 
     *
     * @param string|null $iPRange
     *
     * @return self
     */
    public function setIPRange(?string $iPRange) : self
    {
        $this->iPRange = $iPRange;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getGateway() : ?string
    {
        return $this->gateway;
    }
    /**
     * 
     *
     * @param string|null $gateway
     *
     * @return self
     */
    public function setGateway(?string $gateway) : self
    {
        $this->gateway = $gateway;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getAuxiliaryAddresses() : ?iterable
    {
        return $this->auxiliaryAddresses;
    }
    /**
     * 
     *
     * @param string[]|null $auxiliaryAddresses
     *
     * @return self
     */
    public function setAuxiliaryAddresses(?iterable $auxiliaryAddresses) : self
    {
        $this->auxiliaryAddresses = $auxiliaryAddresses;
        return $this;
    }
}