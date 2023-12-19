<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillForceDeletedEvent;

class RunSkillForceDeletedListenerJob
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
     * @param SkillForceDeletedEvent $event
     * @return void
     */
    public function handle(SkillForceDeletedEvent $event)
    {

    }
}
