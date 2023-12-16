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

                MenuSection::make(__('fields.menu.users'), [
                    MenuItem::resource('\App\Nova\User'),
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

            ];

        });

    }
}
