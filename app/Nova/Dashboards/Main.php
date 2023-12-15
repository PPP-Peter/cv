<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\AllUserPerDay;
use App\Nova\Metrics\EditorsPerDay;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;
use Wame\DatePicker\DatePicker;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            (new DatePicker())->width('full'),
            (new AllUserPerDay())->width('1/2'),
            (new EditorsPerDay())->width('1/2'),
        ];
    }
}
