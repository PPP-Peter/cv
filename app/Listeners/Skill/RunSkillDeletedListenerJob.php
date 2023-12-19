<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillDeletedEvent;

class RunSkillDeletedListenerJob
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
     * @param SkillDeletedEvent $event
     * @return void
     */
    public function handle(SkillDeletedEvent $event)
    {

    }
}
