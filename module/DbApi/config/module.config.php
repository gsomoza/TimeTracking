<?php
return array(
    'router' => array(
        'routes' => array(
            'db-api.rest.doctrine.user' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/users[/:username]',
                    'defaults' => array(
                        'controller' => 'DbApi\\V1\\Rest\\User\\Controller',
                    ),
                ),
            ),
            'db-api.rest.doctrine.worklog' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/worklogs[/:worklog_id]',
                    'defaults' => array(
                        'controller' => 'DbApi\\V1\\Rest\\Worklog\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'DbApi\\V1\\Rest\\User\\UserFetchListener' => 'DbApi\\V1\\Rest\\User\\UserFetchListener',
            'DbApi\\Hydrator\\Strategy\\CollectionIds' => 'DbApi\\Hydrator\\Strategy\\CollectionIds',
            'ZF\\Apigility\\Doctrine\\Server\\Hydrator\\StrategyCollectionExtract' => 'ZF\\Apigility\\Doctrine\\Server\\Hydrator\\Strategy\\CollectionExtract',
        ),
        'factories' => array(
            'DbApi\\OAuth2\\DoctrineOrmAdapter' => 'DbApi\\OAuth2\\DoctrineOrmAdapterFactory',
        ),
    ),
    'validators' => array(
        'factories' => array(
            'DbApi\\ContentValidation\\Validator\\Doctrine\\NoObjectExists' => 'DbApi\\ContentValidation\\Validator\\Doctrine\\NoObjectExistsFactory',
        ),
        'validator_metadata' => array(
            'DbApi\\ContentValidation\\Validator\\Doctrine\\NoObjectExists' => array(
                'object_repository' => 'string',
                'fields' => 'string',
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'db-api.rest.doctrine.user',
            1 => 'db-api.rest.doctrine.worklog',
        ),
    ),
    'zf-oauth2' => array(
        'storage' => 'DbApi\\OAuth2\\DoctrineOrmAdapter',
        'configuration' => array(
            'user_entity' => 'Db\\Entity\\User',
            'client_entity' => 'Db\\Entity\\Client',
            'scope_entity' => 'Db\\Entity\\Scope',
            'access_token_entity' => 'Db\\Entity\\AccessToken',
            'refresh_token_entity' => 'Db\\Entity\\RefreshToken',
        ),
    ),
    'zf-rest' => array(
        'DbApi\\V1\\Rest\\User\\Controller' => array(
            'listener' => 'DbApi\\V1\\Rest\\User\\UserResource',
            'route_name' => 'db-api.rest.doctrine.user',
            'route_identifier_name' => 'username',
            'entity_identifier_name' => 'username',
            'collection_name' => 'user',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'query',
                1 => 'orderBy',
            ),
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => 'Db\\Entity\\User',
            'collection_class' => 'DbApi\\V1\\Rest\\User\\UserCollection',
        ),
        'DbApi\\V1\\Rest\\Worklog\\Controller' => array(
            'listener' => 'DbApi\\V1\\Rest\\Worklog\\WorklogResource',
            'route_name' => 'db-api.rest.doctrine.worklog',
            'route_identifier_name' => 'worklog_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'worklog',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(
                0 => 'query',
                1 => 'orderBy',
            ),
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => 'Db\\Entity\\Worklog',
            'collection_class' => 'DbApi\\V1\\Rest\\Worklog\\WorklogCollection',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'DbApi\\V1\\Rest\\User\\Controller' => 'HalJson',
            'DbApi\\V1\\Rest\\Worklog\\Controller' => 'HalJson',
        ),
        'accept-whitelist' => array(
            'DbApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.db-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'DbApi\\V1\\Rest\\Worklog\\Controller' => array(
                0 => 'application/vnd.db-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content-type-whitelist' => array(
            'DbApi\\V1\\Rest\\User\\Controller' => array(
                0 => 'application/vnd.db-api.v1+json',
                1 => 'application/json',
            ),
            'DbApi\\V1\\Rest\\Worklog\\Controller' => array(
                0 => 'application/vnd.db-api.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Db\\Entity\\User' => array(
                'route_identifier_name' => 'username',
                'entity_identifier_name' => 'username',
                'route_name' => 'db-api.rest.doctrine.user',
                'hydrator' => 'DbApi\\V1\\Rest\\User\\UserHydrator',
            ),
            'DbApi\\V1\\Rest\\User\\UserCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'db-api.rest.doctrine.user',
                'is_collection' => true,
            ),
            'Db\\Entity\\Worklog' => array(
                'route_identifier_name' => 'worklog_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'db-api.rest.doctrine.worklog',
                'hydrator' => 'DbApi\\V1\\Rest\\Worklog\\WorklogHydrator',
            ),
            'DbApi\\V1\\Rest\\Worklog\\WorklogCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'db-api.rest.doctrine.worklog',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'doctrine-connected' => array(
            'DbApi\\V1\\Rest\\User\\UserResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'DbApi\\V1\\Rest\\User\\UserHydrator',
                'listeners' => array(
                    0 => 'DbApi\\V1\\Rest\\User\\UserFetchListener',
                ),
            ),
            'DbApi\\V1\\Rest\\Worklog\\WorklogResource' => array(
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'DbApi\\V1\\Rest\\Worklog\\WorklogHydrator',
            ),
        ),
    ),
    'doctrine-hydrator' => array(
        'DbApi\\V1\\Rest\\User\\UserHydrator' => array(
            'entity_class' => 'Db\\Entity\\User',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => array(
                'worklogs' => 'DbApi\\Hydrator\\Strategy\\CollectionIds',
            ),
        ),
        'DbApi\\V1\\Rest\\Worklog\\WorklogHydrator' => array(
            'entity_class' => 'Db\\Entity\\Worklog',
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
        ),
    ),
    'zf-content-validation' => array(
        'DbApi\\V1\\Rest\\User\\Controller' => array(
            'input_filter' => 'DbApi\\V1\\Rest\\User\\Validator',
        ),
        'DbApi\\V1\\Rest\\Worklog\\Controller' => array(
            'input_filter' => 'DbApi\\V1\\Rest\\Worklog\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'DbApi\\V1\\Rest\\User\\Validator' => array(
            0 => array(
                'name' => 'username',
                'required' => true,
                'allow_empty' => false,
                'continue_if_empty' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => false,
                        ),
                    ),
                    /*1 => array(
                        'name' => 'DbApi\\ContentValidation\\Validator\\Doctrine\\NoObjectExists',
                        'options' => array(
                            'object_manager' => 'doctrine.entitymanager.orm_default',
                            'object_repository' => 'Db\\Entity\\User',
                            'fields' => 'username',
                        ),
                    ),*/
                ),
                'filters' => array(),
            ),
            1 => array(
                'name' => 'password',
                'required' => false,
                'allow_empty' => false,
                'continue_if_empty' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => '4',
                        ),
                    ),
                ),
                'filters' => array(),
            ),
            2 => array(
                'name' => 'firstName',
                'required' => false,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => true,
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => '2',
                            'max' => '50',
                        ),
                    ),
                ),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
            3 => array(
                'name' => 'lastName',
                'required' => false,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => true,
                        ),
                    ),
                    1 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => '2',
                            'max' => '50',
                        ),
                    ),
                ),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
            4 => array(
                'name' => 'dayLength',
                'required' => false,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Int',
                        'options' => array(),
                    ),
                ),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
        ),
        'DbApi\\V1\\Rest\\Worklog\\Validator' => array(
            0 => array(
                'name' => 'user',
                'required' => true,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Alnum',
                        'options' => array(
                            'allowwhitespace' => false,
                        ),
                    ),
                ),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
            1 => array(
                'name' => 'duration',
                'required' => true,
                'filters' => array(),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\I18n\\Validator\\Float',
                        'options' => array(),
                    ),
                ),
                'continue_if_empty' => true,
                'allow_empty' => false,
            ),
            2 => array(
                'name' => 'date',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'continue_if_empty' => true,
                'allow_empty' => false,
            ),
            3 => array(
                'name' => 'notes',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                        'options' => array(),
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                        'options' => array(),
                    ),
                    2 => array(
                        'name' => 'Zend\\Filter\\HtmlEntities',
                        'options' => array(),
                    ),
                ),
                'validators' => array(),
                'allow_empty' => true,
                'continue_if_empty' => true,
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'DbApi\\V1\\Rest\\User\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
            'DbApi\\V1\\Rest\\Worklog\\Controller' => array(
                'entity' => array(
                    'GET' => true,
                    'POST' => false,
                    'PATCH' => true,
                    'PUT' => true,
                    'DELETE' => true,
                ),
                'collection' => array(
                    'GET' => true,
                    'POST' => true,
                    'PATCH' => false,
                    'PUT' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
);
