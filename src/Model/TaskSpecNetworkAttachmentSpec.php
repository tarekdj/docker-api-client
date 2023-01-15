<?php

namespace Tarekdj\Docker\ApiClient\Model;

class TaskSpecNetworkAttachmentSpec
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
     * ID of the container represented by this task
     *
     * @var string|null
     */
    protected $containerID;
    /**
     * ID of the container represented by this task
     *
     * @return string|null
     */
    public function getContainerID() : ?string
    {
        return $this->containerID;
    }
    /**
     * ID of the container represented by this task
     *
     * @param string|null $containerID
     *
     * @return self
     */
    public function setContainerID(?string $containerID) : self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;
        return $this;
    }
}