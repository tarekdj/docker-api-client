<?php

namespace Tarekdj\Docker\ApiClient\Model;

class EventActor
{
    /**
     * The ID of the object emitting the event
     *
     * @var string|null
     */
    protected $iD;
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @var string[]|null
     */
    protected $attributes;
    /**
     * The ID of the object emitting the event
     *
     * @return string|null
     */
    public function getID() : ?string
    {
        return $this->iD;
    }
    /**
     * The ID of the object emitting the event
     *
     * @param string|null $iD
     *
     * @return self
     */
    public function setID(?string $iD) : self
    {
        $this->iD = $iD;
        return $this;
    }
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @return string[]|null
     */
    public function getAttributes() : ?iterable
    {
        return $this->attributes;
    }
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @param string[]|null $attributes
     *
     * @return self
     */
    public function setAttributes(?iterable $attributes) : self
    {
        $this->attributes = $attributes;
        return $this;
    }
}