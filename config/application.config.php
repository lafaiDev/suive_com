<?php
/**
 * Configuration file changed by LosBase
 * The previous configuration file is stored in application.config.old
 */
return array(
    'modules' => array(
        'Application',
        'fo',
        'DoctrineModule',
        'DoctrineORMModule',
        'ZfcBase',
        'ZfcUser',
        'ZfcRbac',
        'ZfcUserDoctrineORM',
        'AssetManager',
        'LosBase',
        'LosUi',
        'LosLog',
        'Client',
        'User',
    ),
    'module_listener_options' => array(
        'module_paths' => array(
            './module',
            './vendor',
            './module',
            './module',
            './module',
            './module',
        ),
        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),
    ),
);
