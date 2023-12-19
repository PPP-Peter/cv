<?php 

namespace App\Listeners\Skill;

use App\Events\Skill\SkillCreatingEvent;

class RunSkillCreatingListenerJob
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
     * @param SkillCreatingEvent $event
     * @return void
     */
    public function handle(SkillCreatingEvent $event)
    {

    }
}
