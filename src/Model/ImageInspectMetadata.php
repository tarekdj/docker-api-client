<?php

namespace Tarekdj\Docker\ApiClient\Model;

class ImageInspectMetadata
{
    /**
    * Date and time at which the image was last tagged in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    This information is only available if the image was tagged locally,
    and omitted otherwise.
    
    *
    * @var string|null
    */
    protected $lastTagTime;
    /**
    * Date and time at which the image was last tagged in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    This information is only available if the image was tagged locally,
    and omitted otherwise.
    
    *
    * @return string|null
    */
    public function getLastTagTime() : ?string
    {
        return $this->lastTagTime;
    }
    /**
    * Date and time at which the image was last tagged in
    [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
    
    This information is only available if the image was tagged locally,
    and omitted otherwise.
    
    *
    * @param string|null $lastTagTime
    *
    * @return self
    */
    public function setLastTagTime(?string $lastTagTime) : self
    {
        $this->lastTagTime = $lastTagTime;
        return $this;
    }
}