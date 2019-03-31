<?php

namespace PlaygroundTemplateHint\View\Renderer;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use PlaygroundTemplateHint\View\Renderer\PhpRendererHint;

class PhpRendererHintFactory implements FactoryInterface
{
    protected $helperManager;
    protected $resolver;

    public function __invoke(ContainerInterface $container, $requestedName, $options = null)
    {
        $renderer = new PhpRendererHint();
        $renderer->setHelperPluginManager($container->get('ViewHelperManager'));
        $renderer->setResolver($container->get('ViewResolver'));

        /*$model       = $this->getViewModel();
        $modelHelper = $this->renderer->plugin('view_model');
        $modelHelper->setRoot($model);*/

        return $renderer;
    }
}