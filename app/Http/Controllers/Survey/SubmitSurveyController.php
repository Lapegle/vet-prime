<?php

namespace App\Http\Controllers\Survey;

use App\Http\Requests\SaveSurveyAnswersRequest;
use App\Models\Answer;
use App\Queries\SentSurvey\GetSentSurveyByToken;

class SubmitSurveyController
{
    public function __invoke(SaveSurveyAnswersRequest $request): void
    {
        $sentSurvey = GetSentSurveyByToken::execute($request->token);
        if (!$sentSurvey || $sentSurvey->is_completed) {
            abort(404);
        }

        $questions = $request->survey['questions'];

        foreach ($questions as $question) {
            Answer::create([
                'sent_survey_id' => $sentSurvey->id,
                'question_id' => $question['id'],
                'answer_rating' => $question['rating'],
                'answer_text' => $question['answer']
            ]);
        }

        $sentSurvey->is_completed = true;
        $sentSurvey->save();
    }
}
