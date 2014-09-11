<?php

namespace Db\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jwt
 */
class Jwt
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $public_key;

    /**
     * @var string
     */
    private $client_id;


    /**
     * Set subject
     *
     * @param string $subject
     * @return Jwt
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set public_key
     *
     * @param string $publicKey
     * @return Jwt
     */
    public function setPublicKey($publicKey)
    {
        $this->public_key = $publicKey;

        return $this;
    }

    /**
     * Get public_key
     *
     * @return string 
     */
    public function getPublicKey()
    {
        return $this->public_key;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return Jwt
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
}
