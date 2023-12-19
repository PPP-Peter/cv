<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillCreatedEvent;

class RunSkillCreatedListenerJob
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
     * @param SkillCreatedEvent $event
     * @return void
     */
    public function handle(SkillCreatedEvent $event)
    {

    }
}
