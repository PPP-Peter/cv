<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolCreatingEvent;

class RunToolCreatingListenerJob
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
     * @param ToolCreatingEvent $event
     * @return void
     */
    public function handle(ToolCreatingEvent $event)
    {

    }
}
