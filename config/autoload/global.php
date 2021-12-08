<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'db' => [
        'driver' => 'Pdo',
        'dsn'    => 'mysql:dbname=firecms;host=localhost;charset=utf8',
        //'dbname' => 'aurora-laminas',
        'username' => 'Evan',
        'password' => 'Hank2001'
    ],
    
    'session' => [
    //         'config' => [
        //             'class' => \User\Model\UsersSessionConfig::class,
        //         ],
        //'storage' => \Laminas\Session\Storage\SessionArrayStorage::class,
        'validators' => [
            // \Laminas\Session\Validator\RemoteAddr::class,
            //\Laminas\Session\Validator\HttpUserAgent::class,
        ],
    ],
    'session_config' => [
        'config_class' => User\Model\UsersSessionConfig::class,
        //'remember_me_seconds' => 60,
    ],
    'session_storage' => [
        'type' => \Laminas\Session\Storage\SessionArrayStorage::class,
    ],
    'session_validators' => [
        \Laminas\Session\Validator\RemoteAddr::class,
        \Laminas\Session\Validator\HttpUserAgent::class,
    ],
    
];
