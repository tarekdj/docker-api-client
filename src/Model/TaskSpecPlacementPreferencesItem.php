<?php

namespace Tarekdj\Docker\ApiClient\Model;

class TaskSpecPlacementPreferencesItem
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
     * @var TaskSpecPlacementPreferencesItemSpread|null
     */
    protected $spread;
    /**
     * 
     *
     * @return TaskSpecPlacementPreferencesItemSpread|null
     */
    public function getSpread() : ?TaskSpecPlacementPreferencesItemSpread
    {
        return $this->spread;
    }
    /**
     * 
     *
     * @param TaskSpecPlacementPreferencesItemSpread|null $spread
     *
     * @return self
     */
    public function setSpread(?TaskSpecPlacementPreferencesItemSpread $spread) : self
    {
        $this->initialized['spread'] = true;
        $this->spread = $spread;
        return $this;
    }
}