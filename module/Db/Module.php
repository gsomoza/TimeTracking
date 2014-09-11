<?php

namespace Db;

use Zend\Mvc\MvcEvent;
use Doctrine\ORM\EntityManager as DoctrineEntityManager;

class Module
{
	static private $entityManager;

	static public function getEntityManager()
	{
		return self::$entityManager;
	}

	static public function setEntityManager(DoctrineEntityManager $entityManager)
	{
		self::$entityManager = $entityManager;
	}

	public function onBootstrap(MvcEvent $e)
	{
		self::setEntityManager($e->getApplication()->getServiceManager()->get('doctrine.entitymanager.orm_default'));
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				),
			),

		);
	}
}
