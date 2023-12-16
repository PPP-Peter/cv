<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\AllUserPerDay;
use App\Nova\Metrics\EditorsPerDay;
use InteractionDesignFoundation\HtmlCard\HtmlCard;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;
use Pppcreative\About\About;
use Pppcreative\Json\Json;
use Pppcreative\Tabs\Tabs;
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
            (new About())->width('full'),

            (new HtmlCard())->width('1/4')->html(
                '<div style="margin:auto">
                                <a href="/resources/tools" style="text-align: center" class="h-2 text-lg"><h1>Nástroje</h1>
                                     <div style="width: 85px; padding-top:10px; margin:auto">
                                         <img src="https://cdn-icons-png.flaticon.com/128/675/675579.png">
                                    </div>
                                </a>
                            </div>'
            ),
            (new HtmlCard())->width('1/4')->html(
                '<div style="margin:auto">
                                <a href="/resources/skills" style="text-align: center" class="h-2 text-lg"><h1>Skills</h1>
                                     <div style="width: 85px; padding-top:10px; margin:auto">
                                        <img src="/storage/img/skill.png">
                                    </div>
                                </a>
                            </div>'
            ),
            (new HtmlCard())->width('1/4')->html(
                '<div style="margin:auto">
                                <a href="/resources/certificates" style="text-align: center" class="h-2 text-lg"><h1>Certifikáty</h1>
                                     <div style="width: 85px; padding-top:10px; margin:auto">
                                         <img src="/storage/img/certificate.png">
                                    </div>
                                </a>
                            </div>'
            ),
            (new HtmlCard())->width('1/4')->html(
                '<div style="margin:auto">
                                <a href="/resources/jobs" style="text-align: center" class="h-2 text-lg"><h1>Jobs</h1>
                                     <div style="width: 85px; margin:auto">
                                          <img src="/storage/img/job.png">
                                    </div>
                                </a>
                            </div>'
            ),

            (new Json())->width('full'),


//            (new DatePicker())->width('full'),
//            (new AllUserPerDay())->width('1/2'),
//            (new EditorsPerDay())->width('1/2'),
        ];
    }
}
