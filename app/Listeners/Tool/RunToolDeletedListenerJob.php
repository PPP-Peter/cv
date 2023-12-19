<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolDeletedEvent;

class RunToolDeletedListenerJob
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
     * @param ToolDeletedEvent $event
     * @return void
     */
    public function handle(ToolDeletedEvent $event)
    {

    }
}
