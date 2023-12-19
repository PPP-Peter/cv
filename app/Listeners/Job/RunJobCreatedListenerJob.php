<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobCreatedEvent;

class RunJobCreatedListenerJob
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
     * @param JobCreatedEvent $event
     * @return void
     */
    public function handle(JobCreatedEvent $event)
    {

    }
}
