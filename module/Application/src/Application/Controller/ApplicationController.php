<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Schema\Table;
use Doctrine\ORM\EntityManager;
use Zend\Console\ColorInterface;
use Zend\Console\Request as ConsoleRequest;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\Configuration\ConfigResource;
use Zend\Config\Writer\PhpArray as PhpArrayWriter;
use Zend\Filter\FilterChain;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Console\Prompt;
use Doctrine\DBAL\DBALException;

class ApplicationController extends AbstractActionController
{
	public function setEventManager(EventManagerInterface $events)
	{
		parent::setEventManager($events);
		$events->attach('dispatch', function($e) {
			$request = $e->getRequest();
			if (!$request instanceof ConsoleRequest) {
				throw new \RuntimeException(sprintf(
					'%s can only be executed in a console environment',
					__CLASS__
				));
			}
		}, 100);
		return $this;
	}

	public function purgeAction()
	{
		/** @var Console $console */
		$console = $this->getServiceLocator()->get('Console');

		$objectManagerAlias = 'doctrine.entitymanager.orm_default';
		/** @var EntityManager $objectManager */
		$objectManager = $this->getServiceLocator()->get($objectManagerAlias);
		$metadataFactory = $objectManager->getMetadataFactory();

		// Collect table names
		$tables = [];
		foreach($metadataFactory->getAllMetadata() as $metadata) {
			$tables[] = $metadata->getTableName();
		}

		// Display prompt
		if(strtolower(Prompt\Line::prompt(
				'Are you sure you want to delete all data from ' . count($tables). ' tables in the database? [type yes] '
			)) !== 'yes'){
			$console->writeLine('Aborting');
			return;
		}

		// Truncate tables
		try {
			$console->writeLine('- Disabling foreign key checks');
			$objectManager->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS=0');

			$console->write('- Truncating tables ');
			foreach($tables as $table){
				$objectManager->getConnection()->executeQuery(sprintf(
					'TRUNCATE TABLE %s',
					$objectManager->getConnection()->quoteIdentifier($table)
				));
				$console->write('.', ColorInterface::GREEN);
			}
			$console->writeLine(' done!', ColorInterface::GREEN);

			$console->writeLine('- Re-enabling foreign key checks');
			$objectManager->getConnection()->executeQuery('SET FOREIGN_KEY_CHECKS=1');
		} catch(DBALException $e) {
			$console->writeLine();
			$console->writeLine(sprintf(
				"A DB exception occured!\n%s: %s",
				get_class($e),
				$e->getMessage()
			), ColorInterface::YELLOW);
			throw $e;
		}

		$console->writeLine('All done! The database is now clean.', ColorInterface::GREEN);
	}

	public function dropAction()
	{
		$console = $this->getConsole();
		$objectManagerAlias = 'doctrine.entitymanager.orm_default';
		/** @var EntityManager $objectManager */
		$objectManager = $this->getServiceLocator()->get($objectManagerAlias);

		// Collect table names
		$tables = array_map(
			function(Table $table){
				return $table->getName();
			},
			$objectManager->getConnection()->getSchemaManager()->listTables()
		);

		// Display prompt
		if(strtolower(Prompt\Line::prompt(
				'Are you sure you want to DROP ' . count($tables). ' tables from the database? [type yes] '
			)) !== 'yes'){
			$console->writeLine('Aborting');
			return;
		}

		// Truncate tables
		if (file_exists(__DIR__ . '/../../../../../data/Database/rollnapi.db')) {
			@unlink(__DIR__ . '/../../../../../data/Database/rollnapi.db');
		}

		$console->writeLine('All done! Tables have been dropped.', ColorInterface::GREEN);
	}

	public function apiModuleAction()
	{
		$moduleName = 'DbApi';
		$objectManagerAlias = 'doctrine.entitymanager.orm_default';
		$routePrefix = 'api';
		$useEntityNamespacesForRoute = true;

		if($this->getServiceLocator()->get('Zend\ModuleManager\ModuleManager')->getModule($moduleName)){
			$this->getConsole()->writeLine(sprintf(
				'The %s is already loaded. If you want to build it again, delete the contents of /modules/%s',
				$moduleName,
				$moduleName
			), ColorInterface::YELLOW);
			return;
		}

		// Build Module
		$moduleResource = $this->getServiceLocator()->get('ZF\Apigility\Admin\Model\ModuleResource');
		$moduleResource->setModulePath(realpath(__DIR__ . '/../../../../../'));

		$metadata = $moduleResource->create(array(
			'name' =>  $moduleName,
		));

		return "$moduleName module has been created.\n";
	}

	public function apiAction()
	{
		$moduleName = 'DbApi';
		$objectManagerAlias = 'doctrine.entitymanager.orm_default';
		$routePrefix = 'api';
		$useEntityNamespacesForRoute = false;

		if(!$this->getServiceLocator()->get('Zend\ModuleManager\ModuleManager')->getModule($moduleName)){
			$this->getConsole()->writeLine(sprintf(
				'Module %s is not loaded. Did you forget to run "./app build api module" ?',
				$moduleName
			), ColorInterface::YELLOW);
			return;
		}

		// Build resources
		$objectManager = $this->getServiceLocator()->get($objectManagerAlias);
		$metadataFactory = $objectManager->getMetadataFactory();

		foreach($metadataFactory->getAllMetadata() as $metadata) {
			if (substr($metadata->getName(), strlen($metadata->namespace) + 1, 8) == 'Abstract')
			{
				continue;
			}

			$entityClassNames[] = $metadata->getName();
		}

		// Get the route prefix and remove any / from ends of string
		if (!$routePrefix) {
			$routePrefix = '';
		} else {
			while(substr($routePrefix, 0, 1) == '/') {
				$routePrefix = substr($routePrefix, 1);
			}

			while(substr($routePrefix, strlen($routePrefix) - 1) == '/') {
				$routePrefix = substr($routePrefix, 0, strlen($routePrefix) - 1);
			}
		}

		$objectManager = $this->getServiceLocator()->get($objectManagerAlias);
		$metadataFactory = $objectManager->getMetadataFactory();

		$serviceResource = $this->getServiceLocator()->get('ZF\Apigility\Doctrine\Admin\Model\DoctrineRestServiceResource');

		// Generate a session id for results on next page
		$results = [];
		foreach ($metadataFactory->getAllMetadata() as $entityMetadata) {
			if (!in_array($entityMetadata->name, $entityClassNames)) continue;

			$resourceName = substr($entityMetadata->name, strlen($entityMetadata->namespace) + 1);

			if (sizeof($entityMetadata->identifier) !== 1) {
				throw new \Exception($entityMetadata->name . " does not have exactly one identifier and cannot be generated");
			}

			$filter = new FilterChain();
			$filter->attachByName('WordCamelCaseToUnderscore')
			       ->attachByName('StringToLower');

			if ($useEntityNamespacesForRoute) {
				$route = '/' . $routePrefix . '/' . $filter(str_replace('\\', '/', $entityMetadata->name));
			} else {
				$route = '/' . $routePrefix . '/' . $filter($resourceName);
			}

			$serviceResource->setModuleName($moduleName);
			$serviceResource->create(array(
				'objectManager' => $objectManagerAlias,
				'serviceName' => $resourceName,
				'entityClass' => $entityMetadata->name,
				'pageSizeParam' => 'limit',
				'routeIidentifierName' => $filter($resourceName) . '_id',
				'entityIdentifierName' => array_pop($entityMetadata->identifier),
				'routeMatch' => $route,
			));

			foreach ($entityMetadata->associationMappings as $mapping) {
				switch ($mapping['type']) {
					case 4:
						$rpcServiceResource = $this->getServiceLocator()->get('ZF\Apigility\Doctrine\Admin\Model\DoctrineRpcServiceResource');
						$rpcServiceResource->setModuleName($moduleName);
						$rpcServiceResource->create(array(
							'service_name' => $resourceName . '' . $mapping['fieldName'],
							'route' => $mappingRoute = $route . '[/:parent_id]/' . $filter($mapping['fieldName']) . '[/:child_id]',
							'http_methods' => array(
								'GET',
							),
							'options' => array(
								'target_entity' => $mapping['targetEntity'],
								'source_entity' => $mapping['sourceEntity'],
								'field_name' => $mapping['fieldName'],
							),
						));

						$results[$entityMetadata->name . $mapping['fieldName']] = $mappingRoute;

						break;
					default:
						break;
				}
			}

			$results[$entityMetadata->name] = $route;
		}

		return (print_r($results, true) . "\nResources have been created.\n");
	}

	/**
	 * @return Console
	 */
	protected function getConsole()
	{
		return $this->getServiceLocator()->get('Console');
	}
}
