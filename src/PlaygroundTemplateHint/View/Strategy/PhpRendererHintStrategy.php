<?php

namespace PlaygroundTemplateHint\View\Strategy;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use PlaygroundTemplateHint\View\Renderer\PhpRendererHint;
use Zend\View\ViewEvent;

class PhpRendererHintStrategy extends \Zend\View\Strategy\PhpRendererStrategy
{
    /**
     *
     * @var ServiceManager
     */
    protected $serviceLocator;

    public function __construct(ServiceLocatorInterface $locator)
    {
        $this->renderer = $locator->get('PhpRendererHint');
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, array($this, 'selectRenderer'), $priority);
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RESPONSE, array($this, 'injectResponse'), $priority);
    }
}
