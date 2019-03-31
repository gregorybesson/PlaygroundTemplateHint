<?php
namespace PlaygroundTemplateHint\View\Strategy;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class PhpRendererHintStrategyFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, $options = null)
    {
        $viewRenderer = $container->get('PhpRendererHint');
        
        return new PhpRendererHintStrategy($viewRenderer);
    }
}