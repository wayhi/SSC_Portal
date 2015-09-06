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





Route::group(['middleware' => 'sentry.auth'], function () {
    Route::get('/', ['as'=>'home','uses'=>'CountController@display']);
    Route::post('/number_appearance',['as'=>'number_appearance','uses'=>'CountController@display']);

    
    Route::post('/statistic', ['as'=>'statistic',function () {
	
    	return view('ssc.statistic',['type'=>Input::get('type'),'count'=>Input::get('count')]);
	}]);
});


