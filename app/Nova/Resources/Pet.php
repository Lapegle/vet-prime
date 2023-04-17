<?php

namespace App\Nova\Resources;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;
use NormanHuth\FontAwesomeField\FontAwesome;

class Pet extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Pet>
     */
    public static $model = \App\Models\Pet::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
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
            ID::make()
                ->sortable(),

            BelongsTo::make(__('Client'), 'client', Client::class)
                ->showCreateRelationButton()
                ->rules('required'),

            Text::make(__('Pet Name'), 'name')
                ->rules('required'),

            FontAwesome::make(__('Singular Species'), function () {
                return $this->species->icon ?? null;
            })->onlyOnIndex(),

            BelongsTo::make(__('Singular Species'), 'species', Species::class)
                ->rules('required')
                ->showCreateRelationButton()
                ->hideFromIndex(),

            BelongsTo::make(__('Breed'), 'breed', Breed::class)
                ->showCreateRelationButton()
                ->nullable(),

            Text::make(__('Color'), 'color'),

            Text::make(__('Sex'), 'sex')
                ->rules('required'),

            Date::make(__('Birth Date'), 'birth_date'),

            Text::make(__('Address'), 'address'),

            HasMany::make(__('Visits'), 'visits', Visit::class)

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
        return [];
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

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Pets');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Pet');
    }

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel()
    {
        return __('Create Pet');
    }
}
