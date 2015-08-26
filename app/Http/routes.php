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

Route::get('/', ['as'=>'home',function () {
    return view('ssc.statistic');
}]);

Route::get('odd_repeat_times',function(){
			return App\Models\view_cq::orderby('id','desc')->take(50)->lists('ODD');
				});
Route::get('even_repeat_times',function(){
			return App\Models\view_cq::all()->take(50)->lists('EVEN');
				});
