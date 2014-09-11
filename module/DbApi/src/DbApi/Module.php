<?php
namespace DbApi;

use Db\Entity\Note;
use Db\Entity\Worklog;
use DbApi\Authorization\AuthorizationListener;
use DbApi\V1\Rest\Note\NoteResource;
use Doctrine\ORM\EntityManager;
use Zend\EventManager\Event;
use Zend\EventManager\StaticEventManager;
use Zend\ModuleManager\ModuleEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Helper\HelperInterface;
use ZF\Apigility\Provider\ApigilityProviderInterface;
use ZF\Hal\Plugin\Hal;
use ZF\MvcAuth\MvcAuthEvent;

class Module implements ApigilityProviderInterface
{

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        // Wire in our listener at priority >1 to ensure it runs before the
        // DefaultAuthorizationListener
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new AuthorizationListener(),
            100
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'ZF\Apigility\Autoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }
}
