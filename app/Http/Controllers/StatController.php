<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use view_cq,view_tj,view_tj;

class StatController extends BaseController
{
    public function display($type)
    {

    	$serial_no=[];
    	$odd_repeat_times=[];
    	$even_repeat_times=[];
    	$big_repeat_times=[];
    	$small_repeat_times=[];
    	switch ($type) {
    		case '重庆时时彩':
    			$result = view_cq::all()->orderby(id,'desc');

    			break;
    		case '天津时时彩':
    			
    			break;
    		case '江西时时彩':
    			
    			break;	
    		default:
    			
    			break;
    	}

    	return view('statistic',['serial_no'=>'','repeat_times'=>'']);
    }
}
