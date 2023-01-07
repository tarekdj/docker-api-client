<?php

namespace Tarekdj\Docker\ApiClient\Model;

class OCIDescriptor
{
    /**
     * The media type of the object this schema refers to.
     *
     * @var string|null
     */
    protected $mediaType;
    /**
     * The digest of the targeted content.
     *
     * @var string|null
     */
    protected $digest;
    /**
     * The size in bytes of the blob.
     *
     * @var int|null
     */
    protected $size;
    /**
     * The media type of the object this schema refers to.
     *
     * @return string|null
     */
    public function getMediaType() : ?string
    {
        return $this->mediaType;
    }
    /**
     * The media type of the object this schema refers to.
     *
     * @param string|null $mediaType
     *
     * @return self
     */
    public function setMediaType(?string $mediaType) : self
    {
        $this->mediaType = $mediaType;
        return $this;
    }
    /**
     * The digest of the targeted content.
     *
     * @return string|null
     */
    public function getDigest() : ?string
    {
        return $this->digest;
    }
    /**
     * The digest of the targeted content.
     *
     * @param string|null $digest
     *
     * @return self
     */
    public function setDigest(?string $digest) : self
    {
        $this->digest = $digest;
        return $this;
    }
    /**
     * The size in bytes of the blob.
     *
     * @return int|null
     */
    public function getSize() : ?int
    {
        return $this->size;
    }
    /**
     * The size in bytes of the blob.
     *
     * @param int|null $size
     *
     * @return self
     */
    public function setSize(?int $size) : self
    {
        $this->size = $size;
        return $this;
    }
}