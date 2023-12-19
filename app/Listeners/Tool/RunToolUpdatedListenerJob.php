<?php

namespace App\Listeners\Tool;

use App\Events\Tool\ToolUpdatedEvent;

class RunToolUpdatedListenerJob
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param ToolUpdatedEvent $event
     * @return void
     */
    public function handle(ToolUpdatedEvent $event)
    {
        $entity = $event->entity;
        \App\Jobs\UpdateToolJob::dispatchSync($entity);
    }
}
