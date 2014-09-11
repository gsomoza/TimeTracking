<?php

namespace Db;

return array(
	'data-fixture' => array(
		'Db_fixture' => __DIR__ . '/../src/Db/Fixture',
	),
	'doctrine' => array(
		'driver' => array(
			'db_driver' => array(
				'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
				'cache' => 'array',
				'paths' => array(__DIR__ . '/xml'),
			),
			'orm_default' => array(
				'drivers' => array(
					__NAMESPACE__ . '\Entity' => 'db_driver',
				),
			),
		),
        'entity_resolver' => array(
            'orm_default' => array(
                'resolvers' => array(
                    'LdcZfOAuth2Doctrine\Entity\UserEntity' => 'Db\Entity\User',
                ),
            ),
        ),
	),
);
