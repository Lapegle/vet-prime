<?php

namespace App\Queries\SentSurvey;

use App\Models\SentSurvey;

class GetSentSurveyByToken
{
    /**
     * @param string $token
     * @return SentSurvey|null
     */
    public static function execute(string $token): ?SentSurvey
    {
//        dd(SentSurvey::where('token', $token)->with(['survey', 'survey.questions'])->first());
        return SentSurvey::where('token', $token)->with(['survey', 'survey.questions'])->first();
    }
}
