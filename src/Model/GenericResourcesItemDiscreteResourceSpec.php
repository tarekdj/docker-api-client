<?php

namespace Tarekdj\Docker\ApiClient\Model;

class GenericResourcesItemDiscreteResourceSpec
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
    protected $kind;
    /**
     * 
     *
     * @var int|null
     */
    protected $value;
    /**
     * 
     *
     * @return string|null
     */
    public function getKind() : ?string
    {
        return $this->kind;
    }
    /**
     * 
     *
     * @param string|null $kind
     *
     * @return self
     */
    public function setKind(?string $kind) : self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getValue() : ?int
    {
        return $this->value;
    }
    /**
     * 
     *
     * @param int|null $value
     *
     * @return self
     */
    public function setValue(?int $value) : self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}