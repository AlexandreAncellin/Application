<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Helpers\MessagesHelper;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'authentication' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/inscription',
                    'defaults' => [
                        'controller' => Controller\AuthenticationController::class,
                        'action'     => 'register',
                    ],
                ],
            ],
            'login' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/connexion',
                    'defaults' => [
                        'controller' => Controller\AuthenticationController::class,
                        'action'     => 'login',
                    ],
                ],
            ],
            'disconnect' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/deconnexion',
                    'defaults' => [
                        'controller' => Controller\AuthenticationController::class,
                        'action'     => 'disconnect',
                    ],
                ],
            ],
            'users' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/users[/:id]',
                    'defaults' => [
                        'controller' => Controller\UsersController::class,
                        'action'     => 'users',
                    ],
                ],
            ],
            'deleteUser' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/user/delete[/:id]',
                    'defaults' => [
                        'controller' => Controller\UsersController::class,
                        'action'     => 'deleteUser',
                    ],
                ],
            ],
            'wall' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/page[/:id]',
                    'defaults' => [
                        'controller' => Controller\WallController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'administration' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/administration',
                    'defaults' => [
                        'controller' => Controller\AdminController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'getMessages' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/getMessages',
                    'defaults' => [
                        'controller' => Controller\DefaultController::class,
                        'action'     => 'getFlashMessages',
                    ],
                ],
            ],
            'userWall' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/maPage[/:id]',
                    'defaults' => [
                        'controller' => Controller\UserWallController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\AuthenticationController::class => InvokableFactory::class,
            Controller\AdminController::class => InvokableFactory::class,
            Controller\UsersController::class => InvokableFactory::class,
            Controller\UserWallController::class => InvokableFactory::class,
            Controller\DefaultController::class => InvokableFactory::class,
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
    'view_helpers' => array(
        'factories' => [
            Helpers\MessagesHelper::class => InvokableFactory::class,
        ],
        'aliases' => [
            'getMessages' => Helpers\MessagesHelper::class,
        ],
    ),
    'translator' => array(
        'locale' => 'fr_FR',
        'translation_file_patterns' => array(
            array(
                'type'     => 'phparray',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
];
