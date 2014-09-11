<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AuthorizationCode
 */
class AuthorizationCode
{
    /**
     * @var string
     */
    private $redirect_uri;

    /**
     * @var \DateTime
     */
    private $expire;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var string
     */
    private $id_token;

    /**
     * @var string
     */
    private $authorization_code;

    /**
     * @var \Db\Entity\Client
     */
    private $client;

    /**
     * @var \Db\Entity\User
     */
    private $user;


    /**
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return AuthorizationCode
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirect_uri = $redirectUri;

        return $this;
    }

    /**
     * Get redirect_uri
     *
     * @return string 
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * Set expire
     *
     * @param \DateTime $expire
     * @return AuthorizationCode
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;

        return $this;
    }

    /**
     * Get expire
     *
     * @return \DateTime 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return AuthorizationCode
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
     * Set id_token
     *
     * @param string $idToken
     * @return AuthorizationCode
     */
    public function setIdToken($idToken)
    {
        $this->id_token = $idToken;

        return $this;
    }

    /**
     * Get id_token
     *
     * @return string 
     */
    public function getIdToken()
    {
        return $this->id_token;
    }

    /**
     * Set authorization_code
     *
     * @param string $authorizationCode
     * @return AuthorizationCode
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorization_code = $authorizationCode;

        return $this;
    }

    /**
     * Get authorization_code
     *
     * @return string 
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * Set client
     *
     * @param \Db\Entity\Client $client
     * @return AuthorizationCode
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

    /**
     * Set user
     *
     * @param \Db\Entity\User $user
     * @return AuthorizationCode
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
}
