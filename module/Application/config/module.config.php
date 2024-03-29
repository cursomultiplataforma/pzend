<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                    ],
                ],
            ],
            'temario' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/temario[/:id]',
                    'defaults' => [
                        'controller' => Controller\TemarioController::class,
                    ],
                ],
            ],
            'curso' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/curso[/:id]',
                    'defaults' => [
                        'controller' => Controller\CursoController::class,
                    ],
                ],
            ],
            'usuario' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/usuario[/:id]',
                    'defaults' => [
                        'controller' => Controller\UsuarioController::class,
                    ],
                ],
            ],
            'usuariocurso' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/usuariocurso[/:id][/:data]',
                    'defaults' => [
                        'controller' => Controller\UsuarioCursoController::class,
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\TemarioController::class => Controller\Factory\TemarioControllerFactory::class,
            Controller\CursoController::class => Controller\Factory\CursoControllerFactory::class,
            Controller\UsuarioController::class => Controller\Factory\UsuarioControllerFactory::class,
            Controller\UsuarioCursoController::class => Controller\Factory\UsuarioCursoControllerFactory::class,
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
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ],
];