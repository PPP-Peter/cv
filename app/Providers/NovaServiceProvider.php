<?php

namespace App\Providers;


use App\Providers\Nova\Footer;
use App\Providers\Nova\MainMenu;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Wame\TelInput\TelInput;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        MainMenu::make();
        Footer::make();
        Nova::style('app', resource_path('css/app.css'));
        // Nova::withoutNotificationCenter();

        Nova::script('admin', resource_path('js/admin.js'));
        // Nova::withoutThemeSwitcher(); // this method disables the theme switcher

        Nova::serving(function () {
            $pathToFile = resource_path('lang/vendor/nova/sk/components.json');
            Nova::translations($pathToFile);
        });

    }



    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        $settings = \Outl1ne\NovaSettings\NovaSettings::addSettingsFields([
            Tabs::make(__('status.detail', ['title']), [
                Tab::make(__('settings.settings'), [
                    Heading::make('<p class="text-danger">* Tieto údaje sa zobrazia v sekcii  \'O mne\'</p>')->asHtml(),
                    Text::make(__('settings.address'), 'address')->suggestions(['Hervartov 68'])->rules('required'), //->withMeta(['extraAttributes' => ['style' => 'color:white']])
                    TelInput::make(__('settings.phone'), 'phone')->onlyCountries(['SK', 'CZ'])->rules('required'),
                    Email::make(__('settings.email'), 'email')->default('p.petermanik@gmail.com')->rules('required'),
                ]),
            ])
        ], [])->addSettingsFields([], [], 'suppage');

        return [
            (new \Sereny\NovaPermissions\NovaPermissions()), // ->canSee(fn ($request) => $request->user()->isAnyAdmin()),
            (new \Outl1ne\NovaSettings\NovaSettings)
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     //
    }
}
