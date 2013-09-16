<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'PhpRendererHintStrategy' => 'PlaygroundTemplateHint\View\Strategy\PhpRendererHintStrategyFactory',
            'PhpRendererHint' =>  'PlaygroundTemplateHint\View\Renderer\PhpRendererHintFactory',
        ),
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'zend-developer-tools/toolbar/request'=> __DIR__ . '/../view/zend-developer-tools/toolbar/request.phtml',
            //'zend-developer-tools/toolbar/template-hint' => __DIR__ . '/../view/zend-developer-tools/toolbar/template-hint.phtml',
        ),
    ),
    
    'zenddevelopertools' => array(
        'profiler' => array(
            'collectors' => array(
                'template_hint' => 'playground_templatehint_collector',
            ),
        ),
        
        'toolbar' => array(
            'entries' => array(
                // uncomment if you want to use a specific view
                //'template_hint' => 'zend-developer-tools/toolbar/template-hint',
            ),
            'template_hint' => false,
        ),
    ),
);