<?php
/**
 * DoctrineOrmAdapter.php
 * @author      Gabriel Somoza <gabriel@usestrategery.com>
 * @date        8/28/2014 12:00 PM
 * @copyright   Copyright (c) 2014
 */

namespace DbApi\OAuth2;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use LdcZfOAuth2Doctrine\DoctrineOrmAdapter as LdcZDoctrineOrmAdapter;
use Phpro\DoctrineHydrationModule\Hydrator\DoctrineHydrator;

class DoctrineOrmAdapter extends LdcZDoctrineOrmAdapter
{

    /**
     * This override loads the name of the client 'id' field by config instead of assuming its called 'id'.
     *
     * @param $client_id
     *
     * @return bool
     */
    public function isPublicClient($client_id)
    {
        $repository = $this->objectManager->getRepository($this->config['client_entity']);
        $metadata   = $this->objectManager->getClassMetadata($this->config['client_entity']);
        $id_field   = current($metadata->getIdentifierFieldNames());
        /** @var \Db\Entity\Client $object */
        $object = $repository->findOneBy(array( $id_field => $client_id ));
        if ($object instanceof $this->config['client_entity']) {
            $secret = $object->getClientSecret();
            return empty( $secret );
        }
        return false;
    }

    public function getUserDetails($username)
    {
        /** @var \Db\Entity\User $object */
        $object = $this->getUserByUsername($username);
        if (!$object instanceof $this->config['user_entity']) {
            return null;
        }
        return array(
            'user_id' => $object->getUsername(),
            'scope'   => null,
        );
    }

    public function getClientDetails($client_id)
    {
        $object = $this->getClient($client_id);
        if (!$object instanceof $this->config['client_entity']) {
            return null;
        }
        $array = (new DoctrineObject($this->objectManager))->extract($object);
        if (isset( $array['user'] ) && is_object($array['user']) && method_exists($array['user'], 'getUsername')) {
            $array['user_id'] = $array['user']->getUsername();
        }
        return $array;
    }

    public function getDefaultScope($client_id = null)
    {
        $repository = $this->objectManager->getRepository($this->config['scope_entity']);
        $result     = $repository->findBy(array( 'is_default' => true ));
        if ($result) {
            /** @var \Db\Entity\Scope */
            $defaultScope = array_map(
                function ($scope) {
                    return $scope->getScope();
                },
                $result
            );
            return implode(' ', $defaultScope);
        }
        return null;
    }

    /**
     * @param $id
     *
     * @return \Db\Entity\Client
     */
    protected function getClient($id)
    {
        $repository = $this->objectManager->getRepository($this->config['client_entity']);
        $id_field   = $this->_getFirstIdFieldName($this->config['client_entity']);
        $object     = $repository->findOneBy(array( $id_field => $id ));
        return $object;
    }

    protected function _getFirstIdFieldName($className)
    {
        $metadata = $this->objectManager->getClassMetadata($className);
        return current($metadata->getIdentifierFieldNames());
    }

    public function setAccessToken($oauth_token, $client_id, $user_id, $expires, $scope = null)
    {
        $repository = $this->objectManager->getRepository($this->config['access_token_entity']);
        $id_field   = $this->_getFirstIdFieldName($this->config['access_token_entity']);
        /** @var \Db\Entity\AccessToken $object */
        $object = $repository->findOneBy(array( $id_field => $oauth_token ));
        if (!$object instanceof $this->config['access_token_entity']) {
            $object = new $this->config['access_token_entity'];
        }
        $object->setAccessToken($oauth_token);

        $expires = $this->_formatExpires($expires);

        $client = $this->getClient($client_id);
        $object->setClient($client);
        $object->setUser(method_exists($client, 'getUser') ? $client->getUser() : $this->getUserByUsername($user_id));
        $object->setExpires($expires);
        $object->setScope($scope);

        $this->objectManager->persist($object);
        $this->objectManager->flush();
    }

    public function setRefreshToken($refresh_token, $client_id, $user_id, $expires, $scope = null)
    {
        /** @var \Db\Entity\RefreshToken $object */
        $object = new $this->config['refresh_token_entity'];
        $object->setRefreshToken($refresh_token);
        $object->setClient($this->getClient($client_id));
        $object->setUser($this->getUserByUsername($user_id));
        $object->setExpires($this->_formatExpires($expires));
        $object->setScope($scope);

        $this->objectManager->persist($object);
        $this->objectManager->flush();
    }

    /**
     * TODO: This function is still VERY coupled to the field names. Use a hydrator or similar to deal with it.
     * @param $oauth_token
     *
     * @return array
     */
    public function getAccessToken($oauth_token)
    {
        $atRepository = $this->objectManager->getRepository($this->config['access_token_entity']);
        $atIdField = $this->_getFirstIdFieldName($this->config['access_token_entity']);
        $object     = $atRepository->findOneBy(array( $atIdField => $oauth_token ));

        if (!$object instanceof $this->config['access_token_entity']) {
            return null;
        }

        $extractedToken            = (new DoctrineObject($this->objectManager))->extract($object);
        $extractedToken['expires'] = $extractedToken['expires']->format('U');
        if (is_object($extractedToken['client']) && method_exists($extractedToken['client'], 'getClientId')) {
            $extractedToken['client_id'] = $extractedToken['client']->getClientId();
        }
        if (is_object($extractedToken['user']) && method_exists($extractedToken['user'], 'getUsername')) {
            $extractedToken['user_id'] = $extractedToken['user']->getUsername();
        }
        return $extractedToken;
    }

    /**
     * @param $expires
     *
     * @return \DateTime
     */
    protected function _formatExpires($expires)
    {
        if (!$expires instanceof \DateTime) {
            $expires = new \DateTime(date('Y-m-d H:i:s', $expires));
        }
        return $expires;
    }

} 
