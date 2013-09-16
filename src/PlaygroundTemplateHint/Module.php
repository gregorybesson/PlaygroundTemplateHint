<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace PlaygroundTemplateHint;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {

        $serviceManager = $e->getApplication()->getServiceManager();
        $config = $e->getApplication()->getServiceManager()->get('config');
        
        /**
         * HintStrategy activated only when developer toolbar is on and templateHint is on
         */
        	if (isset($config['zenddevelopertools']['toolbar']['enabled'])
        		&& $config['zenddevelopertools']['toolbar']['enabled'] === true
        		&& isset($config['zenddevelopertools']['toolbar']['template_hint'])
        		&& $config['zenddevelopertools']['toolbar']['template_hint'] === true
        	){

        		$e->getApplication()->getEventManager()->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH, function($e) use ($serviceManager) {
        			$strategy = $serviceManager->get('PhpRendererHintStrategy');
        			$view     = $serviceManager->get('ViewManager')->getView();
        			$strategy->attach($view->getEventManager());
        		}, 100);
        	}
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'playground_templatehint_collector'	=> 'PlaygroundTemplateHint\Collector\TemplateHintCollector',
            ),
        );
    }
}
