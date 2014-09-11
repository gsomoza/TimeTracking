<?php

namespace DoctrineORMModule\Proxy\__CG__\Db\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Client extends \Db\Entity\Client implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'client_secret', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'redirect_uri', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'grant_types', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'scope', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'client_id', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'accessTokens', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'authorizationCodes', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'refreshTokens', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'scopes');
        }

        return array('__isInitialized__', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'client_secret', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'redirect_uri', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'grant_types', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'scope', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'client_id', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'accessTokens', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'authorizationCodes', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'refreshTokens', '' . "\0" . 'Db\\Entity\\Client' . "\0" . 'scopes');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Client $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setClientSecret($clientSecret)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClientSecret', array($clientSecret));

        return parent::setClientSecret($clientSecret);
    }

    /**
     * {@inheritDoc}
     */
    public function getClientSecret()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClientSecret', array());

        return parent::getClientSecret();
    }

    /**
     * {@inheritDoc}
     */
    public function setRedirectUri($redirectUri)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRedirectUri', array($redirectUri));

        return parent::setRedirectUri($redirectUri);
    }

    /**
     * {@inheritDoc}
     */
    public function getRedirectUri()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRedirectUri', array());

        return parent::getRedirectUri();
    }

    /**
     * {@inheritDoc}
     */
    public function setGrantTypes($grantTypes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGrantTypes', array($grantTypes));

        return parent::setGrantTypes($grantTypes);
    }

    /**
     * {@inheritDoc}
     */
    public function getGrantTypes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGrantTypes', array());

        return parent::getGrantTypes();
    }

    /**
     * {@inheritDoc}
     */
    public function setScope($scope)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setScope', array($scope));

        return parent::setScope($scope);
    }

    /**
     * {@inheritDoc}
     */
    public function getScope()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScope', array());

        return parent::getScope();
    }

    /**
     * {@inheritDoc}
     */
    public function setClientId($clientId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClientId', array($clientId));

        return parent::setClientId($clientId);
    }

    /**
     * {@inheritDoc}
     */
    public function getClientId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClientId', array());

        return parent::getClientId();
    }

    /**
     * {@inheritDoc}
     */
    public function addAccessToken(\Db\Entity\AccessToken $accessTokens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAccessToken', array($accessTokens));

        return parent::addAccessToken($accessTokens);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAccessToken(\Db\Entity\AccessToken $accessTokens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAccessToken', array($accessTokens));

        return parent::removeAccessToken($accessTokens);
    }

    /**
     * {@inheritDoc}
     */
    public function getAccessTokens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAccessTokens', array());

        return parent::getAccessTokens();
    }

    /**
     * {@inheritDoc}
     */
    public function addAuthorizationCode(\Db\Entity\AuthorizationCode $authorizationCodes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAuthorizationCode', array($authorizationCodes));

        return parent::addAuthorizationCode($authorizationCodes);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAuthorizationCode(\Db\Entity\AuthorizationCode $authorizationCodes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAuthorizationCode', array($authorizationCodes));

        return parent::removeAuthorizationCode($authorizationCodes);
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthorizationCodes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAuthorizationCodes', array());

        return parent::getAuthorizationCodes();
    }

    /**
     * {@inheritDoc}
     */
    public function addRefreshToken(\Db\Entity\RefreshToken $refreshTokens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRefreshToken', array($refreshTokens));

        return parent::addRefreshToken($refreshTokens);
    }

    /**
     * {@inheritDoc}
     */
    public function removeRefreshToken(\Db\Entity\RefreshToken $refreshTokens)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeRefreshToken', array($refreshTokens));

        return parent::removeRefreshToken($refreshTokens);
    }

    /**
     * {@inheritDoc}
     */
    public function getRefreshTokens()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRefreshTokens', array());

        return parent::getRefreshTokens();
    }

    /**
     * {@inheritDoc}
     */
    public function addScope(\Db\Entity\Scope $scopes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addScope', array($scopes));

        return parent::addScope($scopes);
    }

    /**
     * {@inheritDoc}
     */
    public function removeScope(\Db\Entity\Scope $scopes)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeScope', array($scopes));

        return parent::removeScope($scopes);
    }

    /**
     * {@inheritDoc}
     */
    public function getScopes()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getScopes', array());

        return parent::getScopes();
    }

}
