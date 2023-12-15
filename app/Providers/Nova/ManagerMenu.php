<?php
declare(strict_types = 1);

namespace App\Providers\Nova;

use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;

class ManagerMenu
{
    public static function make()
    {

        //            if (auth()->user()->email == 'test1@wame.sk') {
//                $adminmenu =  MenuSection::make('API', [
//                    MenuItem::externalLink('Idea', env('AWS_URL') . '/docs/#idea')->openInNewTab()->withBadge('store, show', 'success'),
//                    MenuItem::externalLink('User', env('AWS_URL') . '/docs/#user')->openInNewTab()->withBadge('index/search', 'danger'),
//                    MenuItem::externalLink('Team', env('AWS_URL') . '/docs/#team')->openInNewTab()->withBadge('index/search', 'info'),
//                ])->icon('sparkles');
//            };

//            dd(\App\Models\Contract::with('statuses')->whereHas('statuses', function ($query) {
//                $query->where('sort', 3);
//            })->get()->count());

        //   dd(\App\Models\User::with('roles')->whereHas('roles')->get());
//
//            dd(\App\Models\User::with('roles')->whereHas('roles', function ($query) {
//                $query->where('name', 'admin');
//            })->get());

        return [

            MenuSection::dashboard('\App\Nova\Dashboards\Main')->icon('view-grid'),
            // MenuItem::externalLink('Moje zmluvy',  '/resources/users/'. auth()->user()->id),
//                MenuSection::make(__('Moje zmluvy'))
//                    ->path('/resources/users/'. auth()->user()->id)
//                    ->icon('document')
//                    ->canSee(function ($request) {return $request->user()->isManager();}),

            MenuSection::make(__('fields.menu.todo'), 'todo')
                ->path('/todo')
                ->icon('server'),

            MenuSection::make(__('fields.menu.documents'), [
                MenuItem::externalLink('Moje zmluvy', '/resources/users/' . auth()->user()->id),
                MenuItem::resource('\App\Nova\Contract')
                    ->withBadge(' ' . \App\Models\Contract::with('statuses')->whereHas('statuses', function ($query) {
                            $query->where('sort', 2);
                        })->get()->count() . ' ', 'success'),
            ])->collapsable()->collapsible()->icon('document-text'),

            MenuSection::make(__('fields.menu.users'), [
                MenuItem::resource('\App\Nova\User')
            ])->collapsable()->collapsible()->icon('user'),

        ];

    }
}
