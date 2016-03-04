<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
		#return 'Hello World';
});

Route::get('validatePID', 'FeedbackController@ifvalid');
Route::get('auth', 'FeedbackController@auth');
Route::post('toCreate', 'FeedbackController@toCreate');
Route::post('create', 'FeedbackController@create');
Route::post('vote', 'FeedbackController@vote');
Route::get('presenter', 'FeedbackController@presenter');
Route::get('listener', 'FeedbackController@listener');
Route::get('history', 'FeedbackController@history');
/*get('/email', function(){
    Mail::send('email.test', ['name' => 'test'], functon($message){
        $message->to('yuanyuan920612@gmail.com', 'Some guy')->subject('test!');
    });
});*/

