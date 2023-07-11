<?php

namespace App\Http\Controllers\Pages;

class SurveyCompletedPageController
{
    public function __invoke()
    {
        return inertia('SurveyCompleted');
    }
}
