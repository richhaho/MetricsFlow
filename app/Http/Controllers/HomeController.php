<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo as user_info;
use Auth;
use Redirect;
use DB;
use App\LeadDNA as Leads;
use App\cUsers as cUsers;
use App\Content as Content;
use App\Channel as Channels;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
         //get the logo from the database
        $logo = user_info::select(DB::raw("logo"))->where('user_id', Auth::user()->id)->first();
        $active_leads = cUsers::where('client_id', Auth::user()->client_id)->sum('Value');
        $view_pages = cUsers::where('client_id', Auth::user()->client_id)->orderBy('Value', 'DESC')->take(6)->get();


        $today = Carbon::now();
        $lead_detail = Content::where([['client_id', Auth::user()->client_id],["Date", $today->toDateString()]])->orderBy('Value', 'DESC')->take(3)->get(); 

        $all_leads = Leads::where('client_id', Auth::user()->client_id)->count();
        
        $Aware= Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Awareness']])->count();
        $Considering= Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Considering']])->count();

        $Deciding = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Deciding']])->count();

        $Converted= Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Converted']])->count();

        //$top_channels = Channels::orderBy('Value', 'DESC')->where('client_id', Auth::user()->client_id)->take(3)->get();
        $channels = Channels::orderBy('Value', 'DESC')->where('client_id', Auth::user()->client_id)->take(3)->get();
        $chan_sum = Channels::where('client_id', Auth::user()->client_id)->sum('Value');

        return view('demo', 
        [   'logo' => $logo,
            'active_leads'=>$active_leads, 
            'view_pages'=>$view_pages,
            
            'lead_detail' => $lead_detail,
             'all_leads'=>$all_leads,
             'Aware'=>$Aware,
             'Considering'=>$Considering,
             'Deciding'=>$Deciding,
             'Converted'=>$Converted,
             'channels' => $channels,
             'chan_sum' => $chan_sum
             

        ]);
    }
    public function showTrend()
    {
        //get the user's client id from the request
        $user_id = Auth::user()->id;
        //$id = explode(" ", Auth::user()->name);
        $name = Auth::user()->name;
        // $url = user_info::select(DB::raw('logo'))->where('user_id', $user_id)->first();
        // $name = user_info::select(DB::raw('name'))->where('user_id', $user_id)->first();
        $portfolio = user_info::where('user_id', $user_id)->get();
        $m5 = user_info::where([['user_id', $user_id], ['name', $name]])->get();
        
        return view('Portfolio', [
            'portfolio' => $portfolio,
            'mfive' => $m5
        ]);
    }

    public function postAdminAssignRoles(Request $request){
        $user = User::where('email', $request['email']->first());
        $user->roles()->detach();
        
        if($request['role_user']){
            $user->roles()->attach(Role::where('name' , 'User')->first());
        }

         if($request['role_client']){
            $user->roles()->attach(Role::where('name' , 'Client')->first());
        }
    }

    public function createApiToken(){
        //get the username of the logged in user
        $username = Auth::user()->name;

        //get user id from username from the database
        $user_id = DB::table('users')->select('id')->where('name', $username)->first();
        foreach($user_id as $id){
           // echo $id;
        }        

        //create token against the username
        $api_token = sha1(uniqid($username, true));
       // echo $api_token;

        //check db if token for that user exists
        $check = DB::table('api_tokens')->where('user_id', $id)->get();

        if(!empty($check)){
            $api = $check;
        }else{
             $create_token = DB::table('api_tokens')->insert(['user_id' => $id, 'name' => $username, 'token' => $api_token, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now(), 'expires_at' => \Carbon\Carbon::tomorrow()]);

        }

        //get the data from db
        $api = DB::table('api_tokens')->where('user_id', $id)->get();

        return view ('profile', ['api' => $api]);


    }
}
