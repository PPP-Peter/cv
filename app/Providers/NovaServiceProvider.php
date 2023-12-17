<?php

namespace App\Providers;


use App\Providers\Nova\Footer;
use App\Providers\Nova\MainMenu;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

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
        Nova::withoutNotificationCenter();

        Nova::script('admin', resource_path('js/admin.js'));
//        Nova::withoutThemeSwitcher(); // this method disables the theme switcher

//        Nova::serving(function () {
//            $pathToFile = resource_path('lang/vendor/nova/sk/components.json');
//            Nova::translations($pathToFile);
//        });

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
        return [
            (new \Sereny\NovaPermissions\NovaPermissions())
                ->canSee(function ($request) {
                    return $request->user()->isAnyAdmin();
                }),
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
