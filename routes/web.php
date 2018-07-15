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

Route::resource('/schools','SchoolController');
Route::resource('/school/{school}/subjects','SubjectController');
Route::resource('/subject/{subjectid}/topics','TopicController');
Route::resource('/topic/{topicid}/questions','QuestionController');
Route::get('/load', "QuestionController@load")->name("questions.load");


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


