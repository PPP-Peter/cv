<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobUpdatingEvent;

class RunJobUpdatingListenerJob
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
     * @param JobUpdatingEvent $event
     * @return void
     */
    public function handle(JobUpdatingEvent $event)
    {

    }
}
