<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolRestoredEvent;

class RunToolRestoredListenerJob
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
     * @param ToolRestoredEvent $event
     * @return void
     */
    public function handle(ToolRestoredEvent $event)
    {

    }
}
