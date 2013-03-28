<?php
return array(
    'router' => array(
        'routes' => array(
            'poll' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/poll',
                    'defaults' => array(
                        '__NAMESPACE__' => 'KapPoll\Controller',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action[/:id]]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'poll' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/poll[/:action[/:id]]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'Poll',
                            ),
                        ),
                    ),
                    'api' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/api',
                            'defaults' => array(
                                '__NAMESPACE__' => 'KapPoll\Controller\Api',
                            ),
                        ),
                        'may_terminate' => false,
                        'child_routes' => array(
                            'poll' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/poll[/:action][/:id]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Poll',
                                    ),
                                ),
                            ),
                            'option' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/option[/:action][/:id]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Option',
                                    ),
                                ),
                            ),
                            'answer' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/answer[/:action][/:id]',
                                    'constraints' => array(
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                        'controller' => 'Answer',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);