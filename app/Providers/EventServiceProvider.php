<?php

namespace App\Providers;

use App\Events\Job\JobUpdatedEvent;
use App\Events\Skill\SkillUpdatedEvent;
use App\Events\Tool\ToolUpdatedEvent;
use App\Listeners\Job\RunJobUpdatedListenerJob;
use App\Listeners\Skill\RunSkillUpdatedListenerJob;
use App\Listeners\Tool\RunToolUpdatedListenerJob;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Tool;
use App\Observers\JobObserver;
use App\Observers\SkillObserver;
use App\Observers\ToolObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SkillUpdatedEvent::class => [RunSkillUpdatedListenerJob::class],
        ToolUpdatedEvent::class => [RunToolUpdatedListenerJob::class],
        JobUpdatedEvent::class => [RunJobUpdatedListenerJob::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        Skill::observe(SkillObserver::class);
        Tool::observe(ToolObserver::class);
        Job::observe(JobObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
