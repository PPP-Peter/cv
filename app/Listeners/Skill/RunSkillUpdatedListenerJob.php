<?php

namespace App\Listeners\Skill;

use App\Events\Skill\SkillUpdatedEvent;

class RunSkillUpdatedListenerJob
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
     * @param SkillUpdatedEvent $event
     * @return void
     */
    public function handle(SkillUpdatedEvent $event)
    {
        $entity = $event->entity;
        \App\Jobs\UpdateSkillJob::dispatchSync($entity);
    }
}
