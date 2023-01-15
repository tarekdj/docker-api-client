<?php

namespace Tarekdj\Docker\ApiClient\Model;

class TaskSpecContainerSpecPrivilegesSELinuxContext
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
     * Disable SELinux
     *
     * @var bool|null
     */
    protected $disable;
    /**
     * SELinux user label
     *
     * @var string|null
     */
    protected $user;
    /**
     * SELinux role label
     *
     * @var string|null
     */
    protected $role;
    /**
     * SELinux type label
     *
     * @var string|null
     */
    protected $type;
    /**
     * SELinux level label
     *
     * @var string|null
     */
    protected $level;
    /**
     * Disable SELinux
     *
     * @return bool|null
     */
    public function getDisable() : ?bool
    {
        return $this->disable;
    }
    /**
     * Disable SELinux
     *
     * @param bool|null $disable
     *
     * @return self
     */
    public function setDisable(?bool $disable) : self
    {
        $this->initialized['disable'] = true;
        $this->disable = $disable;
        return $this;
    }
    /**
     * SELinux user label
     *
     * @return string|null
     */
    public function getUser() : ?string
    {
        return $this->user;
    }
    /**
     * SELinux user label
     *
     * @param string|null $user
     *
     * @return self
     */
    public function setUser(?string $user) : self
    {
        $this->initialized['user'] = true;
        $this->user = $user;
        return $this;
    }
    /**
     * SELinux role label
     *
     * @return string|null
     */
    public function getRole() : ?string
    {
        return $this->role;
    }
    /**
     * SELinux role label
     *
     * @param string|null $role
     *
     * @return self
     */
    public function setRole(?string $role) : self
    {
        $this->initialized['role'] = true;
        $this->role = $role;
        return $this;
    }
    /**
     * SELinux type label
     *
     * @return string|null
     */
    public function getType() : ?string
    {
        return $this->type;
    }
    /**
     * SELinux type label
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
    /**
     * SELinux level label
     *
     * @return string|null
     */
    public function getLevel() : ?string
    {
        return $this->level;
    }
    /**
     * SELinux level label
     *
     * @param string|null $level
     *
     * @return self
     */
    public function setLevel(?string $level) : self
    {
        $this->initialized['level'] = true;
        $this->level = $level;
        return $this;
    }
}