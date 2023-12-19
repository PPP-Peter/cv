<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolDeletingEvent;

class RunToolDeletingListenerJob
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
     * @param ToolDeletingEvent $event
     * @return void
     */
    public function handle(ToolDeletingEvent $event)
    {

    }
}
