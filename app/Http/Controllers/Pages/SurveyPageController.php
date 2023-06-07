<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Queries\SentSurvey\GetSentSurveyByToken;
use Illuminate\Http\Request;
use Inertia\Response;

class SurveyPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $token): Response
    {
        $sentSurvey = GetSentSurveyByToken::execute($token);
        if (!$sentSurvey || $sentSurvey->is_completed) {
            abort(404);
        }
        return inertia('Survey', [
            'sentSurvey' => $sentSurvey
        ]);
    }
}
