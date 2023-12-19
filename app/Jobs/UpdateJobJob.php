<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Laravel\Nova\Notifications\NovaNotification;
use Laravel\Nova\URL;

class UpdateJobJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $entity;
    /**
     * Create a new job instance.
     */
    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $entity = $this->entity;
        $editor = auth()->user();

        $users = User::role(['user'])->get();
        foreach ($users as $user) {
            $user->notify(NovaNotification::make()
                ->message('Upravená práca: ' . $entity->title . ' užívateľom: ' . $editor->name)
                ->action('Zobraziť prácu', URL::make('/resources/jobs/' . $entity->id))
                ->icon('clipboard-list')
                ->type('success')
            );
        }
    }
}
