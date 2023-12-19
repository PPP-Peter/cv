<?php 

namespace App\Listeners\Tool;

use App\Events\Tool\ToolUpdatingEvent;

class RunToolUpdatingListenerJob
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
     * @param ToolUpdatingEvent $event
     * @return void
     */
    public function handle(ToolUpdatingEvent $event)
    {

    }
}
