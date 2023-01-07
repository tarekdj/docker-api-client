<?php

namespace Tarekdj\Docker\ApiClient\Model;

class SwarmUnlockPostBody
{
    /**
     * The swarm's unlock key.
     *
     * @var string|null
     */
    protected $unlockKey;
    /**
     * The swarm's unlock key.
     *
     * @return string|null
     */
    public function getUnlockKey() : ?string
    {
        return $this->unlockKey;
    }
    /**
     * The swarm's unlock key.
     *
     * @param string|null $unlockKey
     *
     * @return self
     */
    public function setUnlockKey(?string $unlockKey) : self
    {
        $this->unlockKey = $unlockKey;
        return $this;
    }
}