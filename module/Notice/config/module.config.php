<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Notice\Controller\Notice' => 'Notice\Controller\NoticeController',
            'Notice\Controller\Category' => 'Notice\Controller\CategoryController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'notice' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/notice[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Notice\Controller\Notice',
                        'action'     => 'index',
                    ),
                ),
            ),
            'category' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/category[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Notice\Controller\Category',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    
    'view_manager' => array(
        'template_path_stack' => array(
            'notice' => __DIR__ . '/../view',
        ),
    ),
);

?>
