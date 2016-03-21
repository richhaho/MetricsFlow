<?php
namespace App\Http\Controllers;
use App\LeadDNA as Leads;
use Auth;
use DB;
use App\UserInfo as user_info;

use Illuminate\Http\Request;

class NotificationController extends Controller
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
       
        $notification = Leads::select('dbData.UserDetail.*')
            ->join('dbData.UserDetail', function ($join) {
                $join->on('LeadDNA2.e_id', '=', 'UserDetail.e_id')
                ->where([['UserDetail.time', '>', DB::raw('date_sub(now(), INTERVAL 3 DAY)')], 
                ['UserDetail.client_id', '=', Auth::user()->client_id]]);
        })->distinct()->get(); 

        $count = Leads::select('dbData.UserDetail.*')
            ->join('dbData.UserDetail', function ($join) {
                $join->on('LeadDNA2.e_id', '=', 'UserDetail.e_id')
                ->where([['UserDetail.time', '>', DB::raw('date_sub(now(), INTERVAL 3 DAY)')], 
                ['UserDetail.client_id', '=', Auth::user()->client_id]]);
        })->distinct()->get()->count();     
        $logo = user_info::select(DB::raw("logo"))->where('user_id', Auth::user()->id)->first();
      

        return view('notification', [
                'notification' => $notification,
                'count' => $count,
                'logo' => $logo
        ]);
    }
}
