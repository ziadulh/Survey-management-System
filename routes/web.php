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

Route::get('/home', 'HomeController@index')->name('home'); //used

Route::get('/createSurvey','pagesController@survey')->middleware('auth'); //used
Route::post('/store','pagesController@store')->middleware('auth'); //used
Route::get('/surveyList','pagesController@list');  // used
Route::get('/surveyList/{id}/edit','pagesController@edit')->middleware('auth');  // used
Route::post('/surveyList/{id}/update','pagesController@update')->middleware('auth'); // used
Route::post('/surveyList/{id}/delete','pagesController@destroy')->middleware('auth'); // used


Route::get('/survey/questionaire','questionireController@sQueForm')->middleware('auth'); //used

Route::get('/allSurveyQuestionList','surveyQuestionGenerateController@allSurveyQuestionList')->middleware('auth');
Route::get('/allSurveyQuestionList/{id}','surveyQuestionGenerateController@editQuestion')->middleware('auth');
Route::post('/allSurveyQuestionListupdate/{id}','surveyQuestionGenerateController@update')->middleware('auth');
Route::post('/allSurveyQuestionListupdate/{id}/delete','surveyQuestionGenerateController@destroy')->middleware('auth');


Route::get('/surveyList/{id}','surveyQuestionGenerateController@surveyQuistionaireView'); // used
Route::post('/surveyList/{id}/store','surveyQuestionGenerateController@store');
// Route::get('/performsurvey/questionaire/{id}','surveyQuestionGenerateController@questionOptionEdit')->middleware('auth');







Route::post('/survey/store','questionireController@store')->middleware('auth');
// Route::get('/performsurvey/questionaire','formSurveyController@view');
// Route::post('/storeSurvey','formSurveyController@store');
// Route::get('/performedSurveyList','formSurveyController@surveyList');
// Route::get('/performedSurveyList/{data}','formSurveyController@viewPerformedSurvey');
// Route::get('/performedSurveyList/{data}/edit','formSurveyController@editPerformedSurvey');

