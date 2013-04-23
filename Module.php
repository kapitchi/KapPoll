<?php
/**
 * Kapitchi Zend Framework 2 Modules (http://kapitchi.com/)
 *
 * @copyright Copyright (c) 2012-2013 Kapitchi Open Source Team (http://kapitchi.com/open-source-team)
 * @license   http://opensource.org/licenses/LGPL-3.0 LGPL 3.0
 */

namespace KapPoll;

use Zend\ModuleManager\Feature\ControllerProviderInterface,
    Zend\EventManager\EventInterface,
    Zend\ModuleManager\Feature\ServiceProviderInterface,
    Zend\ModuleManager\Feature\ViewHelperProviderInterface,
    KapitchiBase\ModuleManager\AbstractModule,
    KapitchiEntity\Mapper\EntityDbAdapterMapperOptions,
    KapitchiEntity\Mapper\EntityDbAdapterMapper;

class Module extends AbstractModule implements ServiceProviderInterface, ControllerProviderInterface, ViewHelperProviderInterface {

    public function onBootstrap(EventInterface $e) {
        parent::onBootstrap($e);
    }

    public function getControllerConfig() {
        return array(
            'factories' => array(
                //API
                    //Poll
                'KapPoll\Controller\Api\Poll' => function($sm) {
                    $cont = new Controller\Api\PollRestfulController(
                        $sm->getServiceLocator()->get('KapPoll\Service\Poll')
                    );
                    return $cont;
                },
                     //Option
                 'KapPoll\Controller\Api\Option' => function($sm) {
                    $cont = new Controller\Api\OptionRestfulController(
                        $sm->getServiceLocator()->get('KapPoll\Service\Option')
                    );
                    return $cont;
                },
                     //Answer
                  'KapPoll\Controller\Api\Answer' => function($sm) {
                    $cont = new Controller\Api\AnswerRestfulController(
                        $sm->getServiceLocator()->get('KapPoll\Service\Answer')
                    );
                    return $cont;
                },
            )
        );
    }

    public function getViewHelperConfig() {
        return array(
            'factories' => array(
                //poll
                'poll' => function($sm) {
                    $ins = new View\Helper\Poll(
                        $sm->getServiceLocator()->get('KapPoll\Service\Poll')
                    );
                    return $ins;
                },
                //option
                'pollOption' => function($sm) {
                    $ins = new View\Helper\Option(
                        $sm->getServiceLocator()->get('KapPoll\Service\Option')
                    );
                    return $ins;
                },
                //answer
                'pollAnswer' => function($sm) {
                    $ins = new View\Helper\Answer(
                        $sm->getServiceLocator()->get('KapPoll\Service\Answer')
                    );
                    return $ins;
                },
            )
        );
    }

    public function getServiceConfig() {
        return array(
            'invokables' => array(
                'KapPoll\Entity\Poll' => 'KapPoll\Entity\Poll',
                'KapPoll\Entity\Option' => 'KapPoll\Entity\Option',
                'KapPoll\Entity\Answer' => 'KapPoll\Entity\Answer',
            ),
            'factories' => array(
                //Poll
                'KapPoll\Service\Poll' => function ($sm) {
                    $s = new Service\Poll(
                        $sm->get('KapPoll\Mapper\PollDbAdapter'),
                        $sm->get('KapPoll\Entity\Poll'),
                        $sm->get('KapPoll\Entity\PollHydrator')
                    );
                    return $s;
                },
                'KapPoll\Mapper\PollDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $sm->get('KapPoll\Entity\Poll'),
                        $sm->get('KapPoll\Entity\PollHydrator'),
                       'poll'
                    );
                },
                'KapPoll\Entity\PollHydrator' => function ($sm) {
                    //needed here because hydrator tranforms camelcase to underscore
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
                'KapPoll\Form\Poll' => function ($sm) {
                    $ins = new Form\Poll('poll');
                    $ins->setInputFilter($sm->get('KapPoll\Form\PollInputFilter'));
                    return $ins;
                },
                'KapPoll\Form\PollInputFilter' => function ($sm) {
                    $ins = new Form\PollInputFilter();
                    return $ins;
                },                        
                //Option
                'KapPoll\Service\Option' => function ($sm) {
                    $s = new Service\Option(
                        $sm->get('KapPoll\Mapper\OptionDbAdapter'),
                        $sm->get('KapPoll\Entity\Option'),
                        $sm->get('KapPoll\Entity\OptionHydrator')
                    );
                    return $s;
                },
                'KapPoll\Mapper\OptionDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $sm->get('KapPoll\Entity\Option'),
                        $sm->get('KapPoll\Entity\OptionHydrator'),
                        'poll_option'
                    );
                },
                'KapPoll\Entity\OptionHydrator' => function ($sm) {
                    //needed here because hydrator tranforms camelcase to underscore
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
                'KapPoll\Form\Option' => function ($sm) {
                    $ins = new Form\Option('option');
                    $ins->setInputFilter($sm->get('KapPoll\Form\OptionInputFilter'));
                    return $ins;
                },
                'KapPoll\Form\OptionInputFilter' => function ($sm) {
                    $ins = new Form\OptionInputFilter();
                    return $ins;
                },
                //Answer
               'KapPoll\Service\Answer' => function ($sm) {
                    $s = new Service\Answer(
                        $sm->get('KapPoll\Mapper\AnswerDbAdapter'),
                        $sm->get('KapPoll\Entity\Answer'),
                        $sm->get('KapPoll\Entity\AnswerHydrator')
                    );
                    return $s;
                },
                'KapPoll\Mapper\AnswerDbAdapter' => function ($sm) {
                    return new EntityDbAdapterMapper(
                        $sm->get('Zend\Db\Adapter\Adapter'),
                        $sm->get('KapPoll\Entity\Answer'),
                        $sm->get('KapPoll\Entity\AnswerHydrator'),
                        'poll_answer'
                    );
                },
                'KapPoll\Entity\AnswerHydrator' => function ($sm) {
                    //needed here because hydrator tranforms camelcase to underscore
                    return new \Zend\Stdlib\Hydrator\ClassMethods(false);
                },
                'KapPoll\Form\Answer' => function ($sm) {
                    $ins = new Form\Answer('answer');
                    $ins->setInputFilter($sm->get('KapPoll\Form\AnswerInputFilter'));
                    return $ins;
                },
                'KapPoll\Form\AnswerInputFilter' => function ($sm) {
                    $ins = new Form\AnswerInputFilter();
                    return $ins;
                },        
            )
        );
    }

    public function getDir() {
        return __DIR__;
    }

    public function getNamespace() {
        return __NAMESPACE__;
    }

}