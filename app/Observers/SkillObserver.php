<?php 

namespace App\Observers;

use App\Events\Skill\SkillCreatingEvent;
use App\Events\Skill\SkillCreatedEvent;
use App\Events\Skill\SkillDeletingEvent;
use App\Events\Skill\SkillDeletedEvent;
use App\Events\Skill\SkillForceDeletedEvent;
use App\Events\Skill\SkillRestoredEvent;
use App\Events\Skill\SkillUpdatingEvent;
use App\Events\Skill\SkillUpdatedEvent;
use App\Models\Skill;

class SkillObserver
{
    /**
     * Handle the Skill "creating" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function creating(Skill $entity)
    {
        SkillCreatingEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "created" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function created(Skill $entity)
    {
        SkillCreatedEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "updating" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function updating(Skill $entity)
    {
        SkillUpdatingEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "updated" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function updated(Skill $entity)
    {
        SkillUpdatedEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "deleting" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function deleting(Skill $entity)
    {
        SkillDeletingEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "deleted" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function deleted(Skill $entity)
    {
        SkillDeletedEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "restored" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function restored(Skill $entity)
    {
        SkillRestoredEvent::dispatch($entity);
    }

    /**
     * Handle the Skill "force deleted" event.
     *
     * @param Skill $entity
     * @return void
     */
    public function forceDeleted(Skill $entity)
    {
        SkillForceDeletedEvent::dispatch($entity);
    }
}
