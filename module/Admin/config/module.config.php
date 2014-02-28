<?php
namespace Admin;

return array(
    'doctrine' => array(
        'driver' => array(
            'zfcuser_entity' => array(
            // customize path
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'application_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities',
                    'ZfcUser\Entity' => 'zfcuser_entity',
                )
            )
        )
    ),
    'zfcuser' => array(
        'user_entity_class'       => 'ZfcUser\Entity\User',
        'enable_default_entities' => false,
    ),
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'child_routes' => array(
                    'listuser' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '/utilisateurs[/][:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Admin\Controller\Admin',
                                'action' => 'listuser',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'listuser' => array(
                                'type' => 'segment',
                                'options' => array(
                                    'route' => '/category/:action[/:id]',
                                    'constraints' => array(
                                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'id' => '[0-9]+',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Admin\Controller\Admin',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true
                            )
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Projet' => 'Application\Controller\ProjetController',
            'Admin\Controller\Admin' => 'ZfcAdmin\Controller\AdminController',
            'Admin\Controller\User' => 'ZfcUser\Controller\UserController',
        )
    )
);
