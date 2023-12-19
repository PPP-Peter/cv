<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobForceDeletedEvent;

class RunJobForceDeletedListenerJob
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
     * @param JobForceDeletedEvent $event
     * @return void
     */
    public function handle(JobForceDeletedEvent $event)
    {

    }
}
