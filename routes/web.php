<?php

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
    return view('user.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createSurvey','surveyController@survey')->middleware('auth');
Route::post('/store','surveyController@store')->middleware('auth');
Route::get('/surveyList','surveyController@list');
Route::get('/surveyList/{id}/edit','surveyController@edit')->middleware('auth');
Route::post('/surveyList/{id}/update','surveyController@update')->middleware('auth');
Route::post('/surveyList/{id}/delete','surveyController@destroy')->middleware('auth');


Route::get('/survey/questionaire','surveyQuestionOptionCurdController@surveyQuestionOptionCreateForm')->middleware('auth');
Route::post('/survey/store','surveyQuestionOptionCurdController@surveyQuestionOptionCreateFormStore')->middleware('auth');
Route::get('/surveyList/{id}','surveyQuestionOptionCurdController@surveyQuistionaireView');
Route::post('/surveyList/{id}/store','surveyQuestionOptionCurdController@store');
Route::get('/allSurveyQuestionList','surveyQuestionOptionCurdController@allSurveyQuestionList')->middleware('auth');
Route::get('/allSurveyQuestionList/{id}','surveyQuestionOptionCurdController@editQuestion')->middleware('auth');
Route::post('/allSurveyQuestionListupdate/{id}','surveyQuestionOptionCurdController@update')->middleware('auth');
Route::post('/allSurveyQuestionListupdate/{id}/delete','surveyQuestionOptionCurdController@destroy')->middleware('auth');


// Route::get('/performsurvey/questionaire/{id}','surveyQuestionGenerateController@questionOptionEdit')->middleware('auth');
Route::get('/surveyProfessionCreatorForm','surveyPerformerProfessionController@createProfession')->middleware('auth');
Route::post('/surveyProfessionCreatorForm/store','surveyPerformerProfessionController@storeProfession')->middleware('auth');
Route::get('/surveyProfessionList','surveyPerformerProfessionController@surveyProfessionList')->middleware('auth');
Route::get('/surveyProfessionList/{id}','surveyPerformerProfessionController@editProfession')->middleware('auth');
Route::post('/surveyProfessionList/{id}/updated','surveyPerformerProfessionController@updateProfession')->middleware('auth');
Route::post('/surveyProfessionList/{id}/delete','surveyPerformerProfessionController@destroy')->middleware('auth');


Route::get('/surveyReport','surveyReportMaker@report')->middleware('auth');
Route::get('/professionwise/surveyReport','surveyReportMaker@surveyReportMakerForProfessional')->middleware('auth');
Route::get('/questionwise/report','surveyReportMaker@questionWiseReport');

