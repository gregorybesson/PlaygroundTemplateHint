<?php

namespace PlaygroundTemplateHint\View\Renderer;

use Zend\ServiceManager\ServiceLocatorInterface;
use PlaygroundTemplateHint\View\Renderer\PhpRendererHint;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class PhpRendererHintFactory implements FactoryInterface
{
	protected $helperManager;
	protected $resolver;

	public function __invoke(ContainerInterface $container, $requestedName, $options = NULL)
    {
		$renderer = new PhpRendererHint($container);

        return $renderer;
    }
}