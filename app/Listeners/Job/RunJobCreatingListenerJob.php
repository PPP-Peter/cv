<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobCreatingEvent;

class RunJobCreatingListenerJob
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
     * @param JobCreatingEvent $event
     * @return void
     */
    public function handle(JobCreatingEvent $event)
    {

    }
}
