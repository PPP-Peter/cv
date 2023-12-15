<?php
declare(strict_types = 1);

namespace App\Providers\Nova;

use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;

class AdminMenu
{
    public static function make()
    {

        return [
            MenuSection::dashboard('\App\Nova\Dashboards\Main')->icon('view-grid'),
            // MenuItem::externalLink('Moje zmluvy',  '/resources/users/'. auth()->user()->id),
//                MenuSection::make(__('Moje zmluvy'))->path('/resources/users/'. auth()->user()->id)->icon('document')
//                    ->canSee(function ($request) {return $request->user()->isManager();}),
            MenuSection::make(__('fields.menu.todo'), 'todo')->path('/todo')->icon('server'),

            MenuSection::make(__('fields.menu.documents'), [
                MenuItem::externalLink('Moje zmluvy', '/resources/users/' . auth()->user()->id),
                MenuItem::resource('\App\Nova\Contract')
                    ->withBadge(' ' . \App\Models\Contract::with('statuses')
                    ->whereHas('statuses', function ($query) {
                            $query->where('sort', 2);
                        })->get()->count() . ' ', 'success'),
            ])->collapsable()->collapsible()->icon('document-text'),

            MenuSection::make(__('fields.menu.users'), [
                MenuItem::resource('\App\Nova\User'),
                MenuItem::resource('\App\Nova\Manager'),
                MenuItem::resource('\App\Nova\Customer'),
                MenuItem::resource('\App\Nova\Group'),
            ])->collapsable()->collapsible()->icon('user'),

            MenuSection::make(__('status.menu.settings'), [
                MenuItem::resource('\App\Nova\Status'),
                MenuItem::resource('\App\Nova\ContractType'),
                //   MenuItem::resource('\App\Nova\Language'),
                MenuItem::resource('\Sereny\NovaPermissions\Nova\Permission')
            ])->collapsable()->collapsible()->icon('cog'),

        ];

    }
}
