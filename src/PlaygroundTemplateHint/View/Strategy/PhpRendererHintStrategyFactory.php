<?php
namespace PlaygroundTemplateHint\View\Strategy;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class PhpRendererHintStrategyFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, $options = NULL)
    {
        $viewRenderer = new PhpRendererHintStrategy($container);

        return $viewRenderer;
    }
}
