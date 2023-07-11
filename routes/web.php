<?php

use App\Http\Controllers\Pages\SurveyCompletedPageController;
use App\Http\Controllers\Pages\SurveyPageController;
use App\Http\Controllers\Survey\SubmitSurveyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/nova');
});

Route::get('/survey/thanks', SurveyCompletedPageController::class)
    ->name('survey.thanks');

Route::get('/survey/{token}', SurveyPageController::class)
    ->name('survey');

Route::post('/survey/{token}', SubmitSurveyController::class)
    ->name('submit_survey');


