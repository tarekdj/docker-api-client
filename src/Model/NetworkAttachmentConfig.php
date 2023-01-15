<?php

namespace Tarekdj\Docker\ApiClient\Model;

class NetworkAttachmentConfig
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
     * The target network for attachment. Must be a network name or ID.
     *
     * @var string|null
     */
    protected $target;
    /**
     * Discoverable alternate names for the service on this network.
     *
     * @var string[]|null
     */
    protected $aliases;
    /**
     * Driver attachment options for the network target.
     *
     * @var string[]|null
     */
    protected $driverOpts;
    /**
     * The target network for attachment. Must be a network name or ID.
     *
     * @return string|null
     */
    public function getTarget() : ?string
    {
        return $this->target;
    }
    /**
     * The target network for attachment. Must be a network name or ID.
     *
     * @param string|null $target
     *
     * @return self
     */
    public function setTarget(?string $target) : self
    {
        $this->initialized['target'] = true;
        $this->target = $target;
        return $this;
    }
    /**
     * Discoverable alternate names for the service on this network.
     *
     * @return string[]|null
     */
    public function getAliases() : ?array
    {
        return $this->aliases;
    }
    /**
     * Discoverable alternate names for the service on this network.
     *
     * @param string[]|null $aliases
     *
     * @return self
     */
    public function setAliases(?array $aliases) : self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;
        return $this;
    }
    /**
     * Driver attachment options for the network target.
     *
     * @return string[]|null
     */
    public function getDriverOpts() : ?iterable
    {
        return $this->driverOpts;
    }
    /**
     * Driver attachment options for the network target.
     *
     * @param string[]|null $driverOpts
     *
     * @return self
     */
    public function setDriverOpts(?iterable $driverOpts) : self
    {
        $this->initialized['driverOpts'] = true;
        $this->driverOpts = $driverOpts;
        return $this;
    }
}