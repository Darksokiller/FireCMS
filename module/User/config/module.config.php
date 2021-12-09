<?php
namespace User;

use Laminas\Router\Http\Segment;

return [
    // The following section is new and should be added to your file:
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'profile' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/user/profile[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\ProfileController::class,
                        'action'     => 'view',
                    ],
                ],
            ],  
        ],
    ],
    
    'user.register' => [
        'type'    => Segment::class,
        'options' => [
            'route' => '/user/register[/:action[/:id]]',
            'constraints' => [
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id'     => '[0-9]+',
            ],
            'defaults' => [
                'controller' => Controller\RegisterController::class,
                'action'     => 'index',
            ],
        ],
    ],
    'user.verify' => [
        'type'    => Segment::class,
        'options' => [
            'route' => '/user/register/verify[/:token]',
            'constraints' => [
                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                'id'     => '[0-9]+',
            ],
            'defaults' => [
                'controller' => Controller\RegisterController::class,
                'action'     => 'verify',
            ],
        ],
    ],
    
    
    'navigation' => [
        'static' => [
            [
                'label' => 'Home',
                'route' => 'home',
                'class' => 'nav-link',
                'order' => '-1',
            ],
            [
                'label' => 'User List',
                'route' => 'user',
                'class' => 'nav-link',
                'action' => 'index',
                'resource' => 'user',
                'privilege' => 'user.view.list',
            ],
            [
                'label' => 'Profile',
                'route' => 'profile',
                'class' => 'nav-link',
                'action' => 'view',
                'resource' => 'user',
                'privilege' => 'view',
            ],
            [
                'label' => 'Login',
                'route' => 'user',
                'class' => 'nav-link',
                'action' => 'login',
                'resource' => 'user',
                'privilege' => 'login.view',
            ],
            [
                'label' => 'Logout',
                'route' => 'user',
                'class' => 'nav-link',
                'action' => 'logout',
                'resource' => 'user',
                'privilege' => 'logout',
            ],
            [
                'label' => 'Register',
                'route' => 'user',
                'class' => 'nav-link',
                'action' => 'register',
                'resource' => 'user',
                'privilege' => 'register.view',
            ],
        ],
    ],
    
    'view_manager' => [
        'template_path_stack' => [
            'user' => __DIR__ . '/../view',
        ],
    ],
];


?>