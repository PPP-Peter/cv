<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobDeletingEvent;

class RunJobDeletingListenerJob
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
     * @param JobDeletingEvent $event
     * @return void
     */
    public function handle(JobDeletingEvent $event)
    {

    }
}
