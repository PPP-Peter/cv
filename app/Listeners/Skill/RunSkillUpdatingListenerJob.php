<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillUpdatingEvent;

class RunSkillUpdatingListenerJob
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
     * @param SkillUpdatingEvent $event
     * @return void
     */
    public function handle(SkillUpdatingEvent $event)
    {

    }
}
