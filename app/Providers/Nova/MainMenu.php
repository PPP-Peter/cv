<?php

declare(strict_types = 1);

namespace App\Providers\Nova;

use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Menu\Menu;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;

class MainMenu
{
    public static function make()
    {
        Nova::mainMenu(function (Request $request, Menu $menu) {

            if (!Auth::user()) return;

            return [
                MenuSection::dashboard('\App\Nova\Dashboards\Main')->icon('view-grid'),

                MenuSection::resource('\App\Nova\Job')->icon('briefcase'),

                MenuSection::resource('\App\Nova\Skill')->icon('book-open'),

                MenuSection::resource('\App\Nova\Tool')->icon('puzzle'),

                MenuSection::resource('\App\Nova\Certificate')->icon('clipboard-list'),

                MenuSection::resource('\App\Nova\User')->icon('users')
                    ->canSee(fn ($request) => $request->user()->isAnyAdmin()),

                MenuSection::make(__('fields.menu.roles'), [
                    MenuItem::resource('\Sereny\NovaPermissions\Nova\Permission'),
                    MenuItem::resource('\Sereny\NovaPermissions\Nova\Role'),
                ])->collapsable()->collapsible()->icon('shield-check')
                ->canSee(fn ($request) => $request->user()->isAnyAdmin()),

                MenuSection::make(__('fields.menu.settings'), [
                    $menu->items[3]->items[0] ,
                ])->collapsable()->collapsible()->icon('cog')


/*
                MenuSection::make(__('fields.menu.users'), [
                    MenuItem::resource('\App\Nova\User')
                        ->canSee(function ($request) {return $request->user()->isAnyAdmin();}),
                ])->collapsable()->collapsible()->icon('user'),

                MenuSection::make(__('fields.menu.certificates'), [
                    MenuItem::resource('\App\Nova\Certificate'),
                ])->collapsable()->collapsible()->icon('clipboard-list'),

                MenuSection::make(__('fields.menu.skills'), [
                    MenuItem::resource('\App\Nova\Skill'),
                ])->collapsable()->collapsible()->icon('book-open'),

                MenuSection::make(__('fields.menu.tools'), [
                    MenuItem::resource('\App\Nova\Tool'),
                ])->collapsable()->collapsible()->icon('puzzle'),

                MenuSection::make(__('fields.menu.jobs'), [
                    MenuItem::resource('\App\Nova\Job'),
                ])->collapsable()->collapsible()->icon('briefcase'),
*/

            ];

        });

    }
}
