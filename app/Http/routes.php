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

Route::get('/', ['as'=>'home','middleware' => 'sentry.auth',function () {
    return view('ssc.statistic',['type'=>'重庆时时彩']);
}]);

Route::post('/statistic', ['as'=>'statistic','middleware' => 'sentry.auth',function () {
	
    return view('ssc.statistic',['type'=>Input::get('type')]);
}]);


