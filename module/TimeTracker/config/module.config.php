<?php
return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'TimeTracker\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'ember-precompile_filter'                    => function ( $sm ) {
                $emberBin = strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' ? 'C:\Users\Gabriel\AppData\Roaming\npm\ember-precompile.cmd' : '/usr/bin/ember-precompile';
                $filter   = new \TimeTracker\Assetic\Filter\EmberPrecompileFilter( $emberBin );
                $filter->setIncludeBaseDir( true );

                return $filter;
            },
            'uglifyjs2_filter'                           => function ( $sm ) {
                $uglifyBin = strtoupper( substr( PHP_OS, 0, 3 ) ) === 'WIN' ? 'C:\Users\Gabriel\AppData\Roaming\npm\uglifyjs.cmd' : '/usr/bin/uglilfyjs';
                $filter    = new \Assetic\Filter\UglifyJsFilter( $uglifyBin );

                return $filter;
            },
            'AssetManager\Service\GlobPathStackResolver' => 'TimeTracker\AssetManager\Service\GlobPathStackResolverServiceFactory'
        ),
    ),
    'translator'      => array(
        'locale'                    => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers'     => array(
        'invokables' => array(
            'TimeTracker\Controller\Index' => 'TimeTracker\Controller\IndexController',
        ),
    ),
    'view_manager'    => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack'      => array(
            __DIR__ . '/../view',
        ),
    ),
    'asset_manager'   => array(
        'caching'          => array(
            'default' => array(
                'cache'   => 'Assetic\\Cache\\FilesystemCache',
                'options' => array(
                    'dir' => 'data/cache',
                ),
            ),
        ),
        'resolvers'        => array(
            'AssetManager\Service\GlobPathStackResolver' => 600
        ),
        'resolver_configs' => array(
            'paths'       => array(
                __DIR__ . '/../assets',
            ),
            'collections' => array(
                /*'js/lib.js' => array(
                    'zf-apigility/js/jquery.min.js',
                    'js/libs/bootstrap.min.js',
                    'js/libs/moment.min.js',
                    'js/libs/handlebars-1.1.2.js',
                    'js/libs/ember-1.7*.min.js',
                    'js/libs/ember-data-1.0*.min.js',
                    'js/libs/ember-simple-auth-0.6.4.js',
                    'js/libs/ember-simple-auth-oauth2-0.6.4.js',
                    'js/libs/ember-forms.js',
                    'js/libs/bs-core.min.js',
                    'js/libs/bs-ember/*.min.js'
                ),*/
                'js/libs/bs-ember.js' => array(
                    'js/libs/bs-ember/*.min.js'
                ),
                'js/tests/tests.js' => array(
                    'js/tests/*.js',
                    'js/tests/*/*.js'
                ),
                'js/timetracker.js' => array(
                    'js/app.js',
                    'js/app/*.js',
                    'js/app/adapters/*.js',
                    'js/app/serializers/*.js',
                    'js/app/routes/*.js',
                    'js/app/bs-ember/*.js',
                    'js/app/models/*.js',
                    'js/app/components/*.js',
                    'js/app/controllers/*.js',
                ),
                'js/handlebars.compiled.js' => array(
                    'hbs/*',
                    'hbs/**/*',
                ),
                'css/styles.css' => array(
                    'css/bootstrap-theme.min.css',
                    'css/bs-growl-notifications.min.css',
                    'css/timetracker.css',
                ),
            ),
        ),
        'filters'          => array(
            'js/handlebars.compiled.js' => array(
                array( 'service' => 'ember-precompile_filter' ),
                array( 'filter' => 'JSMin' ),
            ),
        ),
    ),
);
