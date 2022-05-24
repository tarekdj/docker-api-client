<?php

namespace TestContainersPHP\Docker\ApiClient\Model;

class GraphDriverData
{
    /**
     * Name of the storage driver.
     *
     * @var string|null
     */
    protected $name;
    /**
    * Low-level storage metadata, provided as key/value pairs.
    
    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.
    
    *
    * @var string[]|null
    */
    protected $data;
    /**
     * Name of the storage driver.
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * Name of the storage driver.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->name = $name;
        return $this;
    }
    /**
    * Low-level storage metadata, provided as key/value pairs.
    
    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.
    
    *
    * @return string[]|null
    */
    public function getData() : ?iterable
    {
        return $this->data;
    }
    /**
    * Low-level storage metadata, provided as key/value pairs.
    
    This information is driver-specific, and depends on the storage-driver
    in use, and should be used for informational purposes only.
    
    *
    * @param string[]|null $data
    *
    * @return self
    */
    public function setData(?iterable $data) : self
    {
        $this->data = $data;
        return $this;
    }
}