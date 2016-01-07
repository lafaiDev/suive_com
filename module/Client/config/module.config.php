<?php
return [
    'controllers' => [
        'invokables' => [
            'Client\Controller\Crud' => 'Client\Controller\CrudController',
        ],
    ],
    'router' => [
        'routes' => [
            'client' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/client',
                    'defaults' => [
                        'controller' => 'Client\Controller\Crud',
                        'action' => 'list',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'list' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/list',
                            'defaults' => [
                                'controller' => 'Client\Controller\Crud',
                                'action' => 'list',
                            ],
                        ],
                    ],
                    'view' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/view[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Client\Controller\Crud',
                                'action' => 'view',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'add' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => 'Client\Controller\Crud',
                                'action' => 'add',
                            ],
                        ],
                    ],
                    'edit' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/edit[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Client\Controller\Crud',
                                'action' => 'edit',
                                'id' => 0,
                            ],
                        ],
                    ],
                    'delete' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/delete[/:id]',
                            'constraints' => [
                                'id' => '[0-9]+',
                            ],
                            'defaults' => [
                                'controller' => 'Client\Controller\Crud',
                                'action' => 'delete',
                                'id' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'Client' => __DIR__.'/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'Client_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__.'/../src/Client/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Client\Entity' => 'Client_driver',
                ],
            ],
        ],
    ],
    'navigation' => [
        'default' => [
            'Crud' => [
                'pages' => [
                    'client' => [
                        'label' => 'Client',
                        'route' => 'client/list',
                        'pages' => [
                            'list' => [
                                'label' => 'List',
                                'route' => 'client/list',
                            ],
                            'view' => [
                                'label' => 'View',
                                'route' => 'client/view',
                            ],
                            'add' => [
                                'label' => 'Add',
                                'route' => 'client/add',
                            ],
                            'edit' => [
                                'label' => 'Edit',
                                'route' => 'client/edit',
                            ],
                            'delete' => [
                                'label' => 'Delete',
                                'route' => 'client/delete',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ]
];
