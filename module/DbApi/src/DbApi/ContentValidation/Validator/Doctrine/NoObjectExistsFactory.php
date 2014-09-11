<?php

namespace DbApi\ContentValidation\Validator\Doctrine;

use DoctrineModule\Validator\NoObjectExists;
use DoctrineModule\Validator\UniqueObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\MutableCreationOptionsInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

class NoObjectExistsFactory implements FactoryInterface, MutableCreationOptionsInterface
{
    /**
     * @var array
     */
    protected $options = array();

    /**
     * Sets options property
     *
     * @param array $options
     */
    public function setCreationOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * Creates the service
     *
     * @param ServiceLocatorInterface $validators
     *
     * @return UniqueObject
     */
    public function createService(ServiceLocatorInterface $validators)
    {
        if (isset( $this->options['object_manager'] )) {
            $objectManager    = $validators->getServiceLocator()->get($this->options['object_manager']);
            $objectRepository = $objectManager->getRepository($this->options['object_repository']);

            $fields = array();
            $parts  = explode(',', $this->options['fields']);
            foreach ($parts as $part) {
                $fields[] = trim($part);
            }

            return new NoObjectExists(
                ArrayUtils::merge(
                    $this->options,
                    array(
                        //'object_manager' => $objectManager,
                        'object_repository' => $objectRepository,
                        'fields'            => $fields,
                    )
                )
            );
        }

        return new NoObjectExists($this->options);
    }
}
