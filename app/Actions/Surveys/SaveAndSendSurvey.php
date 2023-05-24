<?php

namespace App\Actions\Surveys;

use App\Models\SentSurvey;
use Illuminate\Support\Str;

class SaveAndSendSurvey
{
    public static function execute(int $survey_id, string $email, $model): void
    {
        $sentSurvey = SentSurvey::create([
            'token' => Str::uuid(),
            'survey_id' => $survey_id
        ]);
        $sentSurvey->surveyable()->associate($model);
        $sentSurvey->save();
    }
}
