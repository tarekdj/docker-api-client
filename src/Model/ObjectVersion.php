<?php

namespace Tarekdj\Docker\ApiClient\Model;

class ObjectVersion
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
     * @var int|null
     */
    protected $index;
    /**
     * 
     *
     * @return int|null
     */
    public function getIndex() : ?int
    {
        return $this->index;
    }
    /**
     * 
     *
     * @param int|null $index
     *
     * @return self
     */
    public function setIndex(?int $index) : self
    {
        $this->initialized['index'] = true;
        $this->index = $index;
        return $this;
    }
}