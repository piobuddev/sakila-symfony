<?php declare(strict_types=1);

namespace Sakila\EventListener;

use League\Fractal\Manager;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * @var \League\Fractal\Manager
     */
    private $manager;

    /**
     * @param \League\Fractal\Manager $manager
     */
    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     *
     * @return void
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            // don't do anything if it's not the master request
            return;
        }

        $request = $event->getRequest();
        if ($request->query->has('include')) {
            $this->manager->parseIncludes($request->get('include'));
        };
    }
}
