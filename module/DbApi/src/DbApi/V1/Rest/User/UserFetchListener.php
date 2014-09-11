<?php
/**
 * UserFetchListener.php
 * @author      Gabriel Somoza <gabriel@usestrategery.com>
 * @date        8/25/2014 11:18 PM
 * @copyright   Copyright (c) 2014
 */

namespace DbApi\V1\Rest\User;

use Db\Entity\User;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

class UserFetchListener implements ListenerAggregateInterface {

	protected $listeners = [];

	/**
	 * Attach one or more listeners
	 *
	 * Implementers may add an optional $priority argument; the EventManager
	 * implementation will pass this to the aggregate.
	 *
	 * @param EventManagerInterface $events
	 *
	 * @return void
	 */
	public function attach( EventManagerInterface $events ) {
		$this->listeners[] = $events->attach('fetch.post', array($this, 'onFetchPost'));
	}

	/**
	 * Detach all previously attached listeners
	 *
	 * @param EventManagerInterface $events
	 *
	 * @return void
	 */
	public function detach( EventManagerInterface $events ) {
		foreach ($this->listeners as $index => $listener) {
			if ($events->detach($listener)) {
				unset($this->listeners[$index]);
			}
		}
	}

	/**
	 * @param $e DoctrineResourceEvent
	 *
	 * @return $this
	 */
	public function onFetchPost($e) {
		/** @var \Db\Entity\User $user */
		$user = $e->getEntity();
		$user->setPassword(''); // hide password
        $e->setEntity($user);
		return $this;
	}

}
