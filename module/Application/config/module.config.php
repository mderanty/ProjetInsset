<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
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
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'application_entities'
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
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Projet',
                        'action' => 'ListProjet',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'projet' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/projet[/][:action][/:idprojet]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'idprojet' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Projet',
                        'action' => 'listProjet',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'addtache' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:actiontache][/][:idtache]',
                            'constraints' => array(
                                'actiontache' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'idtache' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Projet',
                                'action' => 'AddTache',
                            ),
                        ),
                    ),                                       
                    'deletetache' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/delete-tache[/:idtache]',
                            'constraints' => array(
                                'controler'=>'Application\Controller\Projet',
                                'actiontache' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'idtache' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Projet',
                                'action' => 'delete-tache',
                            ),
                        ),
                    ),                                       
                    'edittache' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/edit-tache[/:idtache]',
                            'constraints' => array(
                                'controler'=>'Application\Controller\Projet',
                                'actiontache' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'idtache' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'Application\Controller\Projet',
                                'action' => 'edit-tache',
                            ),
                        ),
                    ),                                       
                ),
            ),
        ),
    ),
    'service_manager' => array(
//        'abstract_factories' => array(
//            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
//            'Zend\Log\LoggerAbstractServiceFactory',
//        ),
//        'aliases' => array(
//            'translator' => 'MvcTranslator',
//        ),
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Application\Service\UserService' => 'Application\Service\Factory\UserServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'fr_FR',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Projet' => 'Application\Controller\ProjetController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
