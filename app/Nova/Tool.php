<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\Traits\HasTabs;
use Illuminate\Database\Eloquent\Builder;
use InteractionDesignFoundation\HtmlCard\HtmlCard;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tool extends BaseResource
{
    use HasTabs;

   /**
    * The model the resource corresponds to.
    *
    * @var string
    */
    public static $model = \App\Models\Tool::class;

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

    const DEFAULT_INDEX_ORDER = 'priority';
    public static function indexQuery(NovaRequest $request, $query): \Illuminate\Database\Eloquent\Builder
    {
        $query->when(empty($request->get('orderBy')), function(Builder $q) {
            $q->getQuery()->orders = [];

            return $q->orderBy(static::DEFAULT_INDEX_ORDER);
        });
     return $query->orderBy(static::DEFAULT_INDEX_ORDER, 'asc');
    }

    public static function relatableQuery(NovaRequest $request, $query)
    {
        return $query->orderBy('priority', 'desc');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Tabs::make(__('tool.detail', ['title' => $this->title]), [
                Tab::make(__('tool.singular'), [
                    ID::make()->onlyOnForms(),

                    Text::make(__('fields.title'), 'title')->sortable(),

                    Text::make(__('fields.description'), 'description')->sortable(),

                    Number::make(__('fields.priority'), 'priority')->sortable(),

                    Select::make('Status', 'status')->options([
                        0 => 'Draft',
                        1 => 'Show',
                        2 => 'Denied',
                    ])->displayUsingLabels()->hideFromIndex(),

                    Badge::make('Status')->map([
                        0 => 'info',
                        1 => 'success',
                        2 => 'danger',
                    ])->labels([
                        0 => 'Draft',
                        1 => 'Show',
                        2 => 'Denied',
                    ])->withIcons(),

                    Images::make(__('fields.image'), 'tool_image'),
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
                '<h1>Obľúbené nástroje pri práci</h1>'
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
