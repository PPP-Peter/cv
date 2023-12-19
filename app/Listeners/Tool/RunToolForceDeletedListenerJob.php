<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolForceDeletedEvent;

class RunToolForceDeletedListenerJob
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
     * @param ToolForceDeletedEvent $event
     * @return void
     */
    public function handle(ToolForceDeletedEvent $event)
    {

    }
}
