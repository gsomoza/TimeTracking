<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scope
 */
class Scope
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var integer
     */
    private $is_default;

    /**
     * @var string
     */
    private $id;

    /**
     * @var \Db\Entity\Client
     */
    private $client;


    /**
     * Set type
     *
     * @param string $type
     * @return Scope
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return Scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string 
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set is_default
     *
     * @param integer $isDefault
     * @return Scope
     */
    public function setIsDefault($isDefault)
    {
        $this->is_default = $isDefault;

        return $this;
    }

    /**
     * Get is_default
     *
     * @return integer 
     */
    public function getIsDefault()
    {
        return $this->is_default;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set client
     *
     * @param \Db\Entity\Client $client
     * @return Scope
     */
    public function setClient(\Db\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Db\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
