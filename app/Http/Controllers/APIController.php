<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Auth;
use Carbon\Carbon;
use App\LeadDNA as Leads;

class APIController extends Controller
{
	
	public function apiauthenticate($email, $token){
		$json_object = null;

		//check if the token exists
		$check_token = DB::table('api_tokens')->select('token')->where('token', $token)->first();
		foreach ($check_token as $tok) {
				if($tok == $token){
					//get the data from the database
					$object = Leads::where([['email', $email], ['conversion', '1'], ['client_id', Auth::user()->client_id]])->get();
					$json_object = json_encode($object);
				}		
		}

		echo $json_object;
		return view('api', ['json_object' => $json_object]);
	}

	public function leadauthenticate($token){
		$json_object = null;
		$date = Carbon::now();
		$time = date('Y-m-d H:i:s', strtotime('-60 minutes', strtotime($date->toTimeString())));	
		

		//check if the token exists
		$check_token = DB::table('api_tokens')->select('token')->where('token', $token)->first();
		foreach ($check_token as $tok) {
				if($tok == $token){
					$object = Leads::where([["client_id" , Auth::user()->client_id], ["Date" , $date->toDateString()],["timevisited", ">=" , DB::raw("CURTIME() - INTERVAL 1 HOUR")]])->get();				
					
					$json_object = json_encode($object);
				}		
	 }
		echo $json_object;
		return view('route');
		
	}

	public function infoauthenticate($lead_id, $token){
		$json_object = null;

		//check if the token exists
		$check_token = DB::table('api_tokens')->select('token')->where('token', $token)->first();
		foreach ($check_token as $tok) {
				if($tok == $token){
					//get the data from the database
					$object = Leads::where([['e_id', $lead_id], ['conversion', '1'], ['client_id', Auth::user()->client_id]])->get();
					$json_object = json_encode($object);
				}		
		}

		echo $json_object;
		return view('getinfo', ['json_object' => $json_object]);
	}

	public function show(){
		return view('testapi');
	}
    
}
