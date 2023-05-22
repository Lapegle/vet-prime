<?php

namespace App\Nova\Resources;

use App\Nova\Actions\SendSurvey;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class Visit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Appointment>
     */
    public static $model = \App\Models\Visit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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

            BelongsTo::make(__('Pet'), 'pet', Pet::class),

            Textarea::make(__('History'), 'history')
                ->rows(3)
                ->alwaysShow(),

            Textarea::make(__('Diagnosis'), 'diagnosis')
                ->rows(3)
                ->alwaysShow(),

            Textarea::make(__('Instructions'), 'instructions')
                ->rows(3)
                ->alwaysShow(),

            Textarea::make(__('Notes'), 'notes')
                ->rows(3)
                ->alwaysShow(),

            Date::make(__('Created at'), 'created_at')
                ->exceptOnForms(),

            new Panel(__('Procedures'), [
                Flexible::make('', 'procedures')
                    ->addLayout(__('Procedure'), 'procedures', [
                        Select::make(__('Medicament'))
                            ->options(\App\Models\Procedure::pluck('name', 'id'))
                            ->displayUsingLabels(),

                        Textarea::make(__('Notes'))
                            ->rows(3)
                            ->alwaysShow()
                    ])
                    ->button(__('Add Procedure'))
                    ->fullWidth()
            ]),

            new Panel(__('Medicaments'), [
                Flexible::make('', 'medicaments')
                    ->addLayout(__('Medicament'), 'medicaments', [
                        Select::make(__('Medicament'))
                            ->options(\App\Models\Medicament::pluck('name', 'id'))
                            ->displayUsingLabels(),

                        Text::make(__('Dosage'))
                    ])
                    ->button(__('Add Medicament'))
                    ->fullWidth()
            ])
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
        return [
            (new SendSurvey)
                ->confirmText(__('Choose survey and email to send it to'))
                ->confirmButtonText(__('Send'))
        ];
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Visits');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Visit');
    }

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel()
    {
        return __('Create Visit');
    }
}
