<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Fare;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('welcome');
    }
    public function postIndex(){
    	// calculate distance
    	$current=Input::get('from');
    	$destination=Input::get('to');

		$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins='.urlencode($current).'&destinations='.urlencode($destination).'&key=AIzaSyBuhdse5XZbloZe92_8pSzFLheUY20__Yo';
    	
    	$json = file_get_contents($url);
    	$data = json_decode($json, TRUE);
    	$response=$data['rows'][0]['elements'][0];

    	$distance_text=$response['distance']['text'];
    	$duration_text=$response['duration']['text'];

    	$dis=$response['distance']['value'];
    	$miles=$dis/1609.34;

    	$rates=Fare::orderBy('id','desc')->first(); //get rates from database
    	
    	if (strpos($current, 'Airport') !== false) {
    		if($miles<5){
    			$fare=20;
    		}
    		elseif($miles>5 && $miles<15){
    			$fare=20+($miles-5)*2;
    		}
    		elseif ($miles>15 && $miles<100) {
    			$fare=30+($miles-15)*1.5;
    		}
    		elseif ($miles>100) {
    			$fare=57.5+$miles;
    		}
		}
		else{
			if($miles<5){
    			$fare=10;
    		}
    		elseif($miles>5 && $miles<15){
    			$fare=10+($miles-5)*2;
    		}
    		elseif ($miles>15 && $miles<100) {
    			$fare=20+($miles-15)*1.5;
    		}
    		elseif ($miles>100) {
    			$fare=47.5+$miles;
    		}
		}
		return view('finalpage')->with('fare',$fare)
								->with('distance',$distance_text)
								->with('duration',$duration_text);


    	





    }
}
