<?php

namespace App\Nova\Filters;

use App\Models\User;
use Laravel\Nova\Filters\Filter;
use Laravel\Nova\Http\Requests\NovaRequest;

class Role extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public function name () {
        return __('fields.role');
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(NovaRequest $request, $query, $value)
    {
        return $query->role( $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function options(NovaRequest $request)
    {
        //$editors = User::role('editor')->pluck('name', 'id')->toArray();
        //$users = User::role('user')->pluck('name', 'id')->toArray();
        //$roles = Role::all()->pluck('name');

        $roles = [
            'user' => 'Užívateľ',
            'editor' => 'Editor',
            'admin' => 'Admin'
        ];

        $options = [];
        foreach ($roles as $name => $role) {
            $options[$role] = $name;
        }

        return $options;
    }

}
