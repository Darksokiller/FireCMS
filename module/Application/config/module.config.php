<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Application\Controller\Plugin\CreateHttpForbiddenModel;
use Application\Controller\Plugin\CreateHttpForbiddenFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'forbidden' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/forbidden',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'forbidden',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'app.admin' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/cms/admin[/:action]',
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'app.admin.add.setting' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/cms/admin/addsetting',
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'addsetting',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\AdminController::class => InvokableFactory::class,
        ],
    ],
    'navigation' => [
        'static' =>[
            [
                'label' => 'Home',
                'route' => 'home',
                'class' => 'nav-link',
                'order' => '-10',
            ],
            [
                'label' => 'Admin',
                'route' => 'app.admin',
                'class' => 'nav-link',
                'resource' => 'admin',
                'privilege' => 'admin.access',
            ],
        ],
        'admin' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'class' => 'nav-link',
                'order' => '-10',
            ],
            [
                'label' => 'App Settings',
                'route' => 'app.admin',
                'class' => 'nav-link',
                'resource' => 'admin',
                'privilege' => 'admin.access',
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];