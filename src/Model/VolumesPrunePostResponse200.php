<?php

namespace Tarekdj\Docker\ApiClient\Model;

class VolumesPrunePostResponse200
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
     * Volumes that were deleted
     *
     * @var string[]|null
     */
    protected $volumesDeleted;
    /**
     * Disk space reclaimed in bytes
     *
     * @var int|null
     */
    protected $spaceReclaimed;
    /**
     * Volumes that were deleted
     *
     * @return string[]|null
     */
    public function getVolumesDeleted() : ?array
    {
        return $this->volumesDeleted;
    }
    /**
     * Volumes that were deleted
     *
     * @param string[]|null $volumesDeleted
     *
     * @return self
     */
    public function setVolumesDeleted(?array $volumesDeleted) : self
    {
        $this->initialized['volumesDeleted'] = true;
        $this->volumesDeleted = $volumesDeleted;
        return $this;
    }
    /**
     * Disk space reclaimed in bytes
     *
     * @return int|null
     */
    public function getSpaceReclaimed() : ?int
    {
        return $this->spaceReclaimed;
    }
    /**
     * Disk space reclaimed in bytes
     *
     * @param int|null $spaceReclaimed
     *
     * @return self
     */
    public function setSpaceReclaimed(?int $spaceReclaimed) : self
    {
        $this->initialized['spaceReclaimed'] = true;
        $this->spaceReclaimed = $spaceReclaimed;
        return $this;
    }
}