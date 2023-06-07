<?php

namespace App\Actions\Surveys;

use App\Models\SentSurvey;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SaveAndSendSurvey
{
    public static function execute(int $survey_id, string $email, $model): void
    {
        $sentSurvey = SentSurvey::create([
            'token' => Str::uuid(),
            'survey_id' => $survey_id,
            'email' => $email
        ]);
        $sentSurvey->surveyable()->associate($model);
        $sentSurvey->save();

        Mail::to($email)->send(new \App\Mail\Survey($sentSurvey));
    }
}
