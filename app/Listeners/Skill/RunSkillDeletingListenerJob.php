<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillDeletingEvent;

class RunSkillDeletingListenerJob
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
     * @param SkillDeletingEvent $event
     * @return void
     */
    public function handle(SkillDeletingEvent $event)
    {

    }
}
