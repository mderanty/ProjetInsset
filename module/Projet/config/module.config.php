<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Projet\Controller\Index' =>
            'Projet\Controller\IndexController',
        ),
    ),
    'controller_plugins' => array(
        'invokables' => array(
            'MessageGetter' =>
            'Custom\Mvc\Controller\Plugin\MessageGetter',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'projet/index/index' =>
            __DIR__ . '/../view/projet/index/index.phtml',
            'projet/index/edit' =>
            __DIR__ . '/../view/projet/index/edit.phtml',
            'projet/index/del' =>
            __DIR__ . '/../view/projet/index/del.phtml',
            'projet/index/view' =>
            __DIR__ . '/../view/projet/index/view.phtml',
        ),
        'template_path_stack' => array(
            'projet' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'projet' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/galeries',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Projet\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'verb' => 'get',
                'may_terminate' => true,
                'child_routes' => array(
                    'add' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/ajout',
                            'defaults' => array(
                                'action' => 'edit',
                            ),
                        ),
                        'verb' => 'get,post',
                    ),
                    'edit' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/editer/:id',
                            'constraints' => array(
                                'id' => '[1-9][0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'edit',
                            ),
                        ),
                        'verb' => 'get,post',
                    ),
                    'del' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/supprimer/:id',
                            'constraints' => array(
                                'id' => '[1-9][0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'del',
                            ),
                        ),
                        'verb' => 'get,post',
                    ),
                    'view' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/voir/:id',
                            'constraints' => array(
                                'id' => '[1-9][0-9]*',
                            ),
                            'defaults' => array(
                                'action' => 'view',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array( 
        'factories' => array( 
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory', 
        ), 
    ),
    'translator' => array( 
        'locale' => 'fr_FR', 
        'translation_file_patterns' => array( 
            array( 
                'type'     => 'gettext', 
                'base_dir' => __DIR__ . '/../language', 
                'pattern'  => '%s.mo', 
                'text_domain'  => 'galerie', 
            ),            
        ), 
    ), 
);