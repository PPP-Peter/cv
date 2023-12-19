<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobRestoredEvent;

class RunJobRestoredListenerJob
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
     * @param JobRestoredEvent $event
     * @return void
     */
    public function handle(JobRestoredEvent $event)
    {

    }
}
