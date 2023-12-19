<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillRestoredEvent;

class RunSkillRestoredListenerJob
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
     * @param SkillRestoredEvent $event
     * @return void
     */
    public function handle(SkillRestoredEvent $event)
    {

    }
}
