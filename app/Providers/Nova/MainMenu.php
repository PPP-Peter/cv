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
        //  Use MainMenu::make();
        Nova::mainMenu(function (Request $request, Menu $menu) {

            if (!Auth::user()) return;

//            if (Auth::user()->hasAnyRole(['admin', 'super-admin'])){
//                isset($menu->items[2]) ? $permissionmenu =  $menu->items[2] : $permissionmenu='';
//                unset($permissionmenu->items[1]);
//                return [ AdminMenu::make(),  $permissionmenu ];
//            }
//
//            else if (Auth::user()->hasRole('manager')){
//                return [ ManagerMenu::make() ];
//            }

            isset($menu->items[2]) ? $permissionmenu =  $menu->items[2] : $permissionmenu='';

            return [
                MenuSection::dashboard('\App\Nova\Dashboards\Main')->icon('view-grid'),

                MenuSection::make(__('fields.menu.users'), [
                    MenuItem::resource('\App\Nova\User'),
                ])->collapsable()->collapsible()->icon('user'),

                $permissionmenu ->canSee(function ($request) {
                    return $request->user()->isAnyAdmin();
                }),

            ];

        });
        
    }
}
