<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Crypt\Password\Bcrypt;

/**
 * User
 */
class User
{
    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var integer
     */
    private $dayLength;

    /**
     * @var string
     */
    private $username;

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
    private $worklog;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->accessTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authorizationCodes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refreshTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->worklog = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        if($password) {
            $bcrypt = new Bcrypt();
            $password = $bcrypt->create($password);
        }
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set first_name
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set day_length
     *
     * @param integer $dayLength
     * @return User
     */
    public function setDayLength($dayLength)
    {
        $this->dayLength = $dayLength;

        return $this;
    }

    /**
     * Get day_length
     *
     * @return integer 
     */
    public function getDayLength()
    {
        return $this->dayLength;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add accessTokens
     *
     * @param \Db\Entity\AccessToken $accessTokens
     * @return User
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
     * @return User
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
     * @return User
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
     * Add worklog
     *
     * @param \Db\Entity\Worklog $worklog
     * @return User
     */
    public function addWorklog(\Db\Entity\Worklog $worklog)
    {
        $this->worklog[] = $worklog;

        return $this;
    }

    /**
     * Remove worklog
     *
     * @param \Db\Entity\Worklog $worklog
     */
    public function removeWorklog(\Db\Entity\Worklog $worklog)
    {
        $this->worklog->removeElement($worklog);
    }

    /**
     * Get worklog
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWorklog()
    {
        return $this->worklog;
    }
}
