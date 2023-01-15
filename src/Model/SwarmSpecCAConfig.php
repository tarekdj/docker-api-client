<?php

namespace Tarekdj\Docker\ApiClient\Model;

class SwarmSpecCAConfig
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
     * The duration node certificates are issued for.
     *
     * @var int|null
     */
    protected $nodeCertExpiry;
    /**
    * Configuration for forwarding signing requests to an external
    certificate authority.
    
    *
    * @var SwarmSpecCAConfigExternalCAsItem[]|null
    */
    protected $externalCAs;
    /**
    * The desired signing CA certificate for all swarm node TLS leaf
    certificates, in PEM format.
    
    *
    * @var string|null
    */
    protected $signingCACert;
    /**
    * The desired signing CA key for all swarm node TLS leaf certificates,
    in PEM format.
    
    *
    * @var string|null
    */
    protected $signingCAKey;
    /**
    * An integer whose purpose is to force swarm to generate a new
    signing CA certificate and key, if none have been specified in
    `SigningCACert` and `SigningCAKey`
    
    *
    * @var int|null
    */
    protected $forceRotate;
    /**
     * The duration node certificates are issued for.
     *
     * @return int|null
     */
    public function getNodeCertExpiry() : ?int
    {
        return $this->nodeCertExpiry;
    }
    /**
     * The duration node certificates are issued for.
     *
     * @param int|null $nodeCertExpiry
     *
     * @return self
     */
    public function setNodeCertExpiry(?int $nodeCertExpiry) : self
    {
        $this->initialized['nodeCertExpiry'] = true;
        $this->nodeCertExpiry = $nodeCertExpiry;
        return $this;
    }
    /**
    * Configuration for forwarding signing requests to an external
    certificate authority.
    
    *
    * @return SwarmSpecCAConfigExternalCAsItem[]|null
    */
    public function getExternalCAs() : ?array
    {
        return $this->externalCAs;
    }
    /**
    * Configuration for forwarding signing requests to an external
    certificate authority.
    
    *
    * @param SwarmSpecCAConfigExternalCAsItem[]|null $externalCAs
    *
    * @return self
    */
    public function setExternalCAs(?array $externalCAs) : self
    {
        $this->initialized['externalCAs'] = true;
        $this->externalCAs = $externalCAs;
        return $this;
    }
    /**
    * The desired signing CA certificate for all swarm node TLS leaf
    certificates, in PEM format.
    
    *
    * @return string|null
    */
    public function getSigningCACert() : ?string
    {
        return $this->signingCACert;
    }
    /**
    * The desired signing CA certificate for all swarm node TLS leaf
    certificates, in PEM format.
    
    *
    * @param string|null $signingCACert
    *
    * @return self
    */
    public function setSigningCACert(?string $signingCACert) : self
    {
        $this->initialized['signingCACert'] = true;
        $this->signingCACert = $signingCACert;
        return $this;
    }
    /**
    * The desired signing CA key for all swarm node TLS leaf certificates,
    in PEM format.
    
    *
    * @return string|null
    */
    public function getSigningCAKey() : ?string
    {
        return $this->signingCAKey;
    }
    /**
    * The desired signing CA key for all swarm node TLS leaf certificates,
    in PEM format.
    
    *
    * @param string|null $signingCAKey
    *
    * @return self
    */
    public function setSigningCAKey(?string $signingCAKey) : self
    {
        $this->initialized['signingCAKey'] = true;
        $this->signingCAKey = $signingCAKey;
        return $this;
    }
    /**
    * An integer whose purpose is to force swarm to generate a new
    signing CA certificate and key, if none have been specified in
    `SigningCACert` and `SigningCAKey`
    
    *
    * @return int|null
    */
    public function getForceRotate() : ?int
    {
        return $this->forceRotate;
    }
    /**
    * An integer whose purpose is to force swarm to generate a new
    signing CA certificate and key, if none have been specified in
    `SigningCACert` and `SigningCAKey`
    
    *
    * @param int|null $forceRotate
    *
    * @return self
    */
    public function setForceRotate(?int $forceRotate) : self
    {
        $this->initialized['forceRotate'] = true;
        $this->forceRotate = $forceRotate;
        return $this;
    }
}