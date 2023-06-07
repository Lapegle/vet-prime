<?php

namespace App\Nova\Actions;

use App\Actions\Surveys\SaveAndSendSurvey;
use App\Models\Survey;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class SendSurvey extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param \Laravel\Nova\Fields\ActionFields $fields
     * @param \Illuminate\Support\Collection $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        SaveAndSendSurvey::execute($fields->survey_id, $fields->email, $models[0]);


        return Action::message(__('Email sent'));
    }

    /**
     * Get the fields available on the action.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Select::make(__('Survey'), 'survey_id')
                ->options(
                    Survey::pluck('title', 'id')
                )
                ->rules(['required']),

            Text::make(__('Email'), 'email')
                ->rules(['required', 'email'])
        ];
    }
}
