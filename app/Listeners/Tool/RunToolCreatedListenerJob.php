<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolCreatedEvent;

class RunToolCreatedListenerJob
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
     * @param ToolCreatedEvent $event
     * @return void
     */
    public function handle(ToolCreatedEvent $event)
    {

    }
}
