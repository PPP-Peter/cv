<?php

namespace App\Nova\User;

use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Illuminate\Validation\Rules;

class DefaultUser {

    public static function defaultFields() {

        return  [
           // Gravatar::make()->maxWidth(50),
           // Avatar::make(__('fields.avatar'), 'avatar'),
           // UiAvatar::make()->squared(),

            Text::make(__('fields.name'), 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Email::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make(__('fields.password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', Rules\Password::defaults())
                ->updateRules('nullable', Rules\Password::defaults()),

             // TelInput::make(__('fields.phone'), 'phone')
            //     ->rules('required'),
        ];

    }


    public static function addressFields() {

        return  [
            Text::make(__('fields.address'), 'address')
                ->hideFromIndex(),

            Text::make(__('fields.city'), 'city')
                ->hideFromIndex(),

            Text::make(__('fields.zip code'), 'zip_code')
                ->hideFromIndex()
                ->rules([ 'max:5'])
                ->maxlength(5),
        ];

    }

}
