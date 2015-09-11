<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\ssc_record;
use Illuminate\Http\Request as Request;

class CountController extends BaseController
{
    public function display(Request $request=null)
    {
        $type='重庆时时彩';
        $record_qty=20;
        
        if($request<>null)
        {

            $type=$request->input('type');
            $record_qty = $request->input('count');
        }
        
        
        $data = Self::count($type,$record_qty);
        return view('ssc.number_count',['data'=>'['.implode($data,',').']','type'=>$type,'count'=>$record_qty]);
    }

    private function count($type,$qty)
    {
        $records = ssc_record::where('type',$type)->orderby('serial_no','desc')->take($qty)->get();
        $count_arr = [];

        for ($i=0; $i <10 ; $i++) { 
            $count_arr[$i]=0;
        }
        //$count_arr[0] = 0;
        foreach($records as $record)
        {
            
            switch (intval($record->ball_1)) {
                case 0:
                    $count_arr[0] +=1;
                    break;
                case 1:
                    $count_arr[1] +=1;
                    break;
                case 2:
                    $count_arr[2] +=1;
                    break;  
                case 3:
                    $count_arr[3] +=1;
                    break;  
                case 4:
                    $count_arr[4] +=1;
                    break;  
                case 5:
                    $count_arr[5] +=1;
                    break; 
                case 6:
                    $count_arr[6] +=1;
                    break; 
                case 7:
                    $count_arr[7] +=1;
                    break;
                case 8:
                    $count_arr[8] +=1;
                    break;  
                case 9:
                    $count_arr[9] +=1;
                    break;                      
                default:
                    
                    break;
            }
            switch (intval($record->ball_2)) {
                case 0:
                    $count_arr[0] +=1;
                    break;
                case 1:
                    $count_arr[1] +=1;
                    break;
                case 2:
                    $count_arr[2] +=1;
                    break;  
                case 3:
                    $count_arr[3] +=1;
                    break;  
                case 4:
                    $count_arr[4] +=1;
                    break;  
                case 5:
                    $count_arr[5] +=1;
                    break; 
                case 6:
                    $count_arr[6] +=1;
                    break; 
                case 7:
                    $count_arr[7] +=1;
                    break;
                case 8:
                    $count_arr[8] +=1;
                    break;  
                case 9:
                    $count_arr[9] +=1;
                    break;                      
                default:
                    
                    break;
            }
            switch (intval($record->ball_3)) {
                case 0:
                    $count_arr[0] +=1;
                    break;
                case 1:
                    $count_arr[1] +=1;
                    break;
                case 2:
                    $count_arr[2] +=1;
                    break;  
                case 3:
                    $count_arr[3] +=1;
                    break;  
                case 4:
                    $count_arr[4] +=1;
                    break;  
                case 5:
                    $count_arr[5] +=1;
                    break; 
                case 6:
                    $count_arr[6] +=1;
                    break; 
                case 7:
                    $count_arr[7] +=1;
                    break;
                case 8:
                    $count_arr[8] +=1;
                    break;  
                case 9:
                    $count_arr[9] +=1;
                    break;                      
                default:
                    
                    break;
            }
            switch (intval($record->ball_4)) {
                case 0:
                    $count_arr[0] +=1;
                    break;
                case 1:
                    $count_arr[1] +=1;
                    break;
                case 2:
                    $count_arr[2] +=1;
                    break;  
                case 3:
                    $count_arr[3] +=1;
                    break;  
                case 4:
                    $count_arr[4] +=1;
                    break;  
                case 5:
                    $count_arr[5] +=1;
                    break; 
                case 6:
                    $count_arr[6] +=1;
                    break; 
                case 7:
                    $count_arr[7] +=1;
                    break;
                case 8:
                    $count_arr[8] +=1;
                    break;  
                case 9:
                    $count_arr[9] +=1;
                    break;                      
                default:
                    
                    break;
            }
            switch (intval($record->ball_5)) {
                case 0:
                    $count_arr[0] +=1;
                    break;
                case 1:
                    $count_arr[1] +=1;
                    break;
                case 2:
                    $count_arr[2] +=1;
                    break;  
                case 3:
                    $count_arr[3] +=1;
                    break;  
                case 4:
                    $count_arr[4] +=1;
                    break;  
                case 5:
                    $count_arr[5] +=1;
                    break; 
                case 6:
                    $count_arr[6] +=1;
                    break; 
                case 7:
                    $count_arr[7] +=1;
                    break;
                case 8:
                    $count_arr[8] +=1;
                    break;  
                case 9:
                    $count_arr[9] +=1;
                    break;                      
                default:
                    
                    break;
            }
        }

       return $count_arr; 

    }





}
