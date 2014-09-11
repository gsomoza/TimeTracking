<?php
/**
 * DoctrineOrmAdapterFactory.php
 * @author      Gabriel Somoza <gabriel@usestrategery.com>
 * @date        8/28/2014 12:12 PM
 * @copyright   Copyright (c) 2014
 */

namespace DbApi\OAuth2;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DoctrineOrmAdapterFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService( ServiceLocatorInterface $serviceLocator ) {
        $config = $serviceLocator->get('Configuration');

        return new DoctrineOrmAdapter(
            $serviceLocator->get($config['zf-oauth2']['object_manager']),
            @$config['zf-oauth2']['configuration'] ?: array()
        );
    }
}
