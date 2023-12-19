<?php 

namespace App\Observers;

use App\Events\Tool\ToolCreatingEvent;
use App\Events\Tool\ToolCreatedEvent;
use App\Events\Tool\ToolDeletingEvent;
use App\Events\Tool\ToolDeletedEvent;
use App\Events\Tool\ToolForceDeletedEvent;
use App\Events\Tool\ToolRestoredEvent;
use App\Events\Tool\ToolUpdatingEvent;
use App\Events\Tool\ToolUpdatedEvent;
use App\Models\Tool;

class ToolObserver
{
    /**
     * Handle the Tool "creating" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function creating(Tool $entity)
    {
        ToolCreatingEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "created" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function created(Tool $entity)
    {
        ToolCreatedEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "updating" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function updating(Tool $entity)
    {
        ToolUpdatingEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "updated" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function updated(Tool $entity)
    {
        ToolUpdatedEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "deleting" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function deleting(Tool $entity)
    {
        ToolDeletingEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "deleted" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function deleted(Tool $entity)
    {
        ToolDeletedEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "restored" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function restored(Tool $entity)
    {
        ToolRestoredEvent::dispatch($entity);
    }

    /**
     * Handle the Tool "force deleted" event.
     *
     * @param Tool $entity
     * @return void
     */
    public function forceDeleted(Tool $entity)
    {
        ToolForceDeletedEvent::dispatch($entity);
    }
}
