<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\Mail\PositionCheckForAdmin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Laravel\Nova\Notifications\NovaNotification;
use Laravel\Nova\URL;

class UpdateSkillJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $skill;
    /**
     * Create a new job instance.
     */
    public function __construct($skill)
    {
        $this->skill = $skill;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $skill = $this->skill;
        $editor = auth()->user();

        $users = User::role(['user'])->get();
        foreach ($users as $user) {
            $user->notify(NovaNotification::make()
                ->message('Upravená schopnosť: ' . $skill->title . ' užívateľom: ' . $editor->name)
                ->action('Zobraziť schopnosť', URL::make('/resources/skills/' . $skill->id))
                ->icon('clipboard-list')
                ->type('success')
            );
        }
    }
}
