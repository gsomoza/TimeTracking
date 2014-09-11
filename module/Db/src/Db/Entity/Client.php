<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 */
class Client
{
    /**
     * @var string
     */
    private $client_secret;

    /**
     * @var string
     */
    private $redirect_uri;

    /**
     * @var string
     */
    private $grant_types;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var string
     */
    private $client_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $accessTokens;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $authorizationCodes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $refreshTokens;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $scopes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accessTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authorizationCodes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refreshTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->scopes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set client_secret
     *
     * @param string $clientSecret
     * @return Client
     */
    public function setClientSecret($clientSecret)
    {
        $this->client_secret = $clientSecret;

        return $this;
    }

    /**
     * Get client_secret
     *
     * @return string 
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * Set redirect_uri
     *
     * @param string $redirectUri
     * @return Client
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
     * Set grant_types
     *
     * @param string $grantTypes
     * @return Client
     */
    public function setGrantTypes($grantTypes)
    {
        $this->grant_types = $grantTypes;

        return $this;
    }

    /**
     * Get grant_types
     *
     * @return string 
     */
    public function getGrantTypes()
    {
        return $this->grant_types;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return Client
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
     * Set client_id
     *
     * @param string $clientId
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;

        return $this;
    }

    /**
     * Get client_id
     *
     * @return string 
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Add accessTokens
     *
     * @param \Db\Entity\AccessToken $accessTokens
     * @return Client
     */
    public function addAccessToken(\Db\Entity\AccessToken $accessTokens)
    {
        $this->accessTokens[] = $accessTokens;

        return $this;
    }

    /**
     * Remove accessTokens
     *
     * @param \Db\Entity\AccessToken $accessTokens
     */
    public function removeAccessToken(\Db\Entity\AccessToken $accessTokens)
    {
        $this->accessTokens->removeElement($accessTokens);
    }

    /**
     * Get accessTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccessTokens()
    {
        return $this->accessTokens;
    }

    /**
     * Add authorizationCodes
     *
     * @param \Db\Entity\AuthorizationCode $authorizationCodes
     * @return Client
     */
    public function addAuthorizationCode(\Db\Entity\AuthorizationCode $authorizationCodes)
    {
        $this->authorizationCodes[] = $authorizationCodes;

        return $this;
    }

    /**
     * Remove authorizationCodes
     *
     * @param \Db\Entity\AuthorizationCode $authorizationCodes
     */
    public function removeAuthorizationCode(\Db\Entity\AuthorizationCode $authorizationCodes)
    {
        $this->authorizationCodes->removeElement($authorizationCodes);
    }

    /**
     * Get authorizationCodes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthorizationCodes()
    {
        return $this->authorizationCodes;
    }

    /**
     * Add refreshTokens
     *
     * @param \Db\Entity\RefreshToken $refreshTokens
     * @return Client
     */
    public function addRefreshToken(\Db\Entity\RefreshToken $refreshTokens)
    {
        $this->refreshTokens[] = $refreshTokens;

        return $this;
    }

    /**
     * Remove refreshTokens
     *
     * @param \Db\Entity\RefreshToken $refreshTokens
     */
    public function removeRefreshToken(\Db\Entity\RefreshToken $refreshTokens)
    {
        $this->refreshTokens->removeElement($refreshTokens);
    }

    /**
     * Get refreshTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRefreshTokens()
    {
        return $this->refreshTokens;
    }

    /**
     * Add scopes
     *
     * @param \Db\Entity\Scope $scopes
     * @return Client
     */
    public function addScope(\Db\Entity\Scope $scopes)
    {
        $this->scopes[] = $scopes;

        return $this;
    }

    /**
     * Remove scopes
     *
     * @param \Db\Entity\Scope $scopes
     */
    public function removeScope(\Db\Entity\Scope $scopes)
    {
        $this->scopes->removeElement($scopes);
    }

    /**
     * Get scopes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getScopes()
    {
        return $this->scopes;
    }
}
