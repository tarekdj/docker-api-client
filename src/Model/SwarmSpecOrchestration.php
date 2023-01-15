<?php

namespace Tarekdj\Docker\ApiClient\Model;

class SwarmSpecOrchestration
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
    * The number of historic tasks to keep per instance or node. If
    negative, never remove completed or failed tasks.
    
    *
    * @var int|null
    */
    protected $taskHistoryRetentionLimit;
    /**
    * The number of historic tasks to keep per instance or node. If
    negative, never remove completed or failed tasks.
    
    *
    * @return int|null
    */
    public function getTaskHistoryRetentionLimit() : ?int
    {
        return $this->taskHistoryRetentionLimit;
    }
    /**
    * The number of historic tasks to keep per instance or node. If
    negative, never remove completed or failed tasks.
    
    *
    * @param int|null $taskHistoryRetentionLimit
    *
    * @return self
    */
    public function setTaskHistoryRetentionLimit(?int $taskHistoryRetentionLimit) : self
    {
        $this->initialized['taskHistoryRetentionLimit'] = true;
        $this->taskHistoryRetentionLimit = $taskHistoryRetentionLimit;
        return $this;
    }
}