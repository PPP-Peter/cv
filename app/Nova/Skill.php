<?php

namespace App\Nova;

use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Traits\HasTabs;
use InteractionDesignFoundation\HtmlCard\HtmlCard;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Sparkline;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Masoudi\Nova\Fields\Progress;

class Skill extends BaseResource
{
    use HasTabs;

   /**
    * The model the resource corresponds to.
    *
    * @var string
    */
    public static $model = \App\Models\Skill::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Tabs::make(__('skill.detail', ['title' => $this->title]), [
                Tab::make(__('skill.singular'), [
                    ID::make()->onlyOnForms(),
                    Text::make(__('fields.title'), 'title')->sortable(),
                    Text::make(__('fields.description'), 'description')->sortable(),

                    Number::make(__('fields.progress'), 'progress')
                        ->hide()->hideFromIndex()->hideFromDetail()->hideWhenUpdating()->hideWhenCreating()
                        ->filterable(),

                    Progress::make(__('fields.progress'), 'progress')
                        ->sortable()
                        ->min(0) // default: 0
                        ->max(100) // default: 100
                        ->step(1) // default: 1
                        ->default(70) // deafult number value
                        ->displayUsing(fn ($progress) => "$progress%"), // change display text: 25%

                    Status::make(__('fields.status'), 'status')->loadingWhen([0])->failedWhen([3])
                        ->sortable(),
                ]),
            ])->withToolbar(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            (new HtmlCard())->width('full')->html(
                '<h1>Schopnosti a znalosti z oblasti programovania</h1>'
            ),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

}
