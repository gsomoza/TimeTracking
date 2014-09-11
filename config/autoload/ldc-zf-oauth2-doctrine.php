<?php
return array(
    'doctrine' => array(
        'entity_resolver' => array(
            'orm_default' => array(
                'resolvers' => array(
                    'LdcZfOAuth2Doctrine\Entity\UserEntity' => 'Db\Entity\User',
                ),
            ),
        ),
    ),
);
