<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RefreshToken
 */
class RefreshToken
{
    /**
     * @var \DateTime
     */
    private $expires;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var string
     */
    private $refresh_token;

    /**
     * @var \Db\Entity\User
     */
    private $user;

    /**
     * @var \Db\Entity\Client
     */
    private $client;


    /**
     * Set expires
     *
     * @param \DateTime $expires
     * @return RefreshToken
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime 
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return RefreshToken
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
     * Set refresh_token
     *
     * @param string $refreshToken
     * @return RefreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refresh_token = $refreshToken;

        return $this;
    }

    /**
     * Get refresh_token
     *
     * @return string 
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * Set user
     *
     * @param \Db\Entity\User $user
     * @return RefreshToken
     */
    public function setUser(\Db\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Db\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set client
     *
     * @param \Db\Entity\Client $client
     * @return RefreshToken
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
