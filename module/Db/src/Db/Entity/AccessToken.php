<?php

namespace Db\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * AccessToken
 */
class AccessToken
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
    private $access_token;

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
     * @param DateTime $expires
     * @return AccessToken
     */
    public function setExpires(DateTime $expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return AccessToken
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
     * Set access_token
     *
     * @param string $accessToken
     * @return AccessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->access_token = $accessToken;

        return $this;
    }

    /**
     * Get access_token
     *
     * @return string 
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * Set user
     *
     * @param \Db\Entity\User $user
     * @return AccessToken
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
     * @return AccessToken
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
