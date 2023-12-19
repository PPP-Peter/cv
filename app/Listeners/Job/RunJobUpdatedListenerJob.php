<?php

namespace App\Listeners\Job;

use App\Events\Job\JobUpdatedEvent;

class RunJobUpdatedListenerJob
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
     * @param JobUpdatedEvent $event
     * @return void
     */
    public function handle(JobUpdatedEvent $event)
    {
        $entity = $event->entity;
        \App\Jobs\UpdateJobJob::dispatchSync($entity);
    }
}
