<?php

namespace Tarekdj\Docker\ApiClient\Model;

class PluginConfigNetwork
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
    protected $type;
    /**
     * 
     *
     * @return string|null
     */
    public function getType() : ?string
    {
        return $this->type;
    }
    /**
     * 
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type) : self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}