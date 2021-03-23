<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/student', function () {
    return view('student');
});

Route::get('/managespe', function () {
    return view('managespe');
});

Route::get('/managestudents', function () {
    return view('managestudents');
});

Route::get('/spe', function () {
    return view('spe');
});

Route::get('/feedback', function () {
    return view('feedback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', 'App\Http\Controllers\ContactController@index')->name('contact');

Route::post('/contact', 'App\Http\Controllers\ContactController@send_mail')->name('addContact');

Route::get('/declaration', function () {
    return view('declaration');
});

// Survey routes
Route::get('/manage-survey', [App\Http\Controllers\SurveyController::class, 'manageSurvey'])->name('manageSurvey');

Route::get('/manage-survey/result/{id}', [App\Http\Controllers\SurveyController::class, 'viewSurveyResult'])->name('viewSurveyResult');

Route::get('/manage-survey/delete/{id}', [App\Http\Controllers\SurveyController::class, 'deleteSurvey'])->name('deleteSurvey');

Route::get('/manage-survey/create', [App\Http\Controllers\SurveyController::class, 'viewCreateSurvey'])->name('viewCreateSurvey');
Route::post('/manage-survey/create', [App\Http\Controllers\SurveyController::class, 'createSurvey'])->name('createSurvey');

Route::get('/survey', [App\Http\Controllers\SurveyController::class, 'index'])->name('survey');

Route::get('/survey/{id}', [App\Http\Controllers\SurveyController::class, 'viewSurvey'])->name('viewSurvey');
Route::post('/survey/{id}', [App\Http\Controllers\SurveyController::class, 'doSurvey'])->name('doSurvey');
