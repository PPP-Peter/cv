<?php 

namespace App\Listeners\Job;

use App\Events\Job\JobDeletedEvent;

class RunJobDeletedListenerJob
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
     * @param JobDeletedEvent $event
     * @return void
     */
    public function handle(JobDeletedEvent $event)
    {

    }
}
