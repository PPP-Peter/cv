<?php 

namespace App\Observers;

use App\Events\Job\JobCreatingEvent;
use App\Events\Job\JobCreatedEvent;
use App\Events\Job\JobDeletingEvent;
use App\Events\Job\JobDeletedEvent;
use App\Events\Job\JobForceDeletedEvent;
use App\Events\Job\JobRestoredEvent;
use App\Events\Job\JobUpdatingEvent;
use App\Events\Job\JobUpdatedEvent;
use App\Models\Job;

class JobObserver
{
    /**
     * Handle the Job "creating" event.
     *
     * @param Job $entity
     * @return void
     */
    public function creating(Job $entity)
    {
        JobCreatingEvent::dispatch($entity);
    }

    /**
     * Handle the Job "created" event.
     *
     * @param Job $entity
     * @return void
     */
    public function created(Job $entity)
    {
        JobCreatedEvent::dispatch($entity);
    }

    /**
     * Handle the Job "updating" event.
     *
     * @param Job $entity
     * @return void
     */
    public function updating(Job $entity)
    {
        JobUpdatingEvent::dispatch($entity);
    }

    /**
     * Handle the Job "updated" event.
     *
     * @param Job $entity
     * @return void
     */
    public function updated(Job $entity)
    {
        JobUpdatedEvent::dispatch($entity);
    }

    /**
     * Handle the Job "deleting" event.
     *
     * @param Job $entity
     * @return void
     */
    public function deleting(Job $entity)
    {
        JobDeletingEvent::dispatch($entity);
    }

    /**
     * Handle the Job "deleted" event.
     *
     * @param Job $entity
     * @return void
     */
    public function deleted(Job $entity)
    {
        JobDeletedEvent::dispatch($entity);
    }

    /**
     * Handle the Job "restored" event.
     *
     * @param Job $entity
     * @return void
     */
    public function restored(Job $entity)
    {
        JobRestoredEvent::dispatch($entity);
    }

    /**
     * Handle the Job "force deleted" event.
     *
     * @param Job $entity
     * @return void
     */
    public function forceDeleted(Job $entity)
    {
        JobForceDeletedEvent::dispatch($entity);
    }
}
