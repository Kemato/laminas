<?php

declare(strict_types=1);

namespace Application;

use Laminas\Router\Http\Segment;
use Laminas\Mvc\Controller\LazyControllerAbstractFactory;


return [
    'router'       => [
        'routes' => [
            'user'            => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/user-list[/:action]',
                    'defaults' => [
                        'controller' => Controller\UsersListController::class,
                        'action'     => 'user',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'change_password' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/password[/:action]',
                    'defaults' => [
                        'controller' => Controller\ChangePasswordController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'sign'            => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/login[/:action]',
                    'defaults' => [
                        'controller' => Controller\SignController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'profile'         => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/profile[/:action/:id]',
                    'defaults' => [
                        'controller' => Controller\ProfileController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'chat'            => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/chat[/:action/:id]',
                    'defaults' => [
                        'controller' => Controller\ChatController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'title'           => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/title/:action[/:id]',
                    'defaults' => [
                        'controller' => Controller\JobTitleController::class,
                        'action'     => 'index',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'profile_edit'    => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/profile-edit/:action[/:id]',
                    'defaults' => [
                        'controller' => Controller\ProfileController::class,
                        'action'     => 'edit',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'users_edit'    => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/admin-list[/:action]',
                    'defaults' => [
                        'controller' => Controller\UsersListController::class,
                        'action'     => 'admin',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ],
            'user_profile_edit' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/user-profile-edit/:id',
                    'defaults' => [
                        'controller' => Controller\ProfileController::class,
                        'action'     => 'adminEdit',
                    ],
                    'constraints' => [
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                ],
            ]
        ],
    ],
    'controllers'  => [
        'factories' => [
            Controller\ChatController::class           => LazyControllerAbstractFactory::class,
            Controller\SignController::class           => LazyControllerAbstractFactory::class,
            Controller\JobTitleController::class       => LazyControllerAbstractFactory::class,
            Controller\UsersListController::class      => LazyControllerAbstractFactory::class,
            Controller\ChangePasswordController::class => LazyControllerAbstractFactory::class,
            Controller\ProfileController::class        => LazyControllerAbstractFactory::class,

        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map'             => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout_admin.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack'      => [
            __DIR__ . '/../view',
        ],
    ],
];
