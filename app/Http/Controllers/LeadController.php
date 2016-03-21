<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\LeadDNA as Leads;
use App\Content as Content;
use App\Conversions as Conversions;
use App\TotalUsers as TotalUsers;
use App\Channel as Channels;
use App\LeadsConverted as Converted;
use App\ReturnUsers as ReturnUsers;
use App\UserInfo as user_info;
use App\Campaigns as Campaigns;
use App\MetUsers as MetUsers;
use Auth;
use Redirect;
use Carbon\Carbon;

class LeadController extends Controller
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

    //Query the database to find the leads according to Verafin's account
    public function showLeads(Request $request){

        $date = Carbon::now();
        $date->subDays(3);
       
       
        $sessions = Leads::where([['client_id', Auth::user()->client_id], ['Date', '>', DB::raw('date_sub(now(), INTERVAL 1 WEEK)') ]])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->get();

        $consideration = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Considering'], ['Date', '>', DB::raw('date_sub(now(), INTERVAL 1 WEEK)') ]])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->get();

        $converted = Converted::where([['client_id', Auth::user()->client_id], ['conversion', '1'], ['Date', '>', DB::raw('date_sub(now(), INTERVAL 1 WEEK)') ]])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->get();
        $deciding = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Deciding'], ['Date',  '>',$date->toDateString()]])->distinct('e_id')->orderBy('Date', 'DESC')->groupBy('e_id')->get();

        $date->subDays(5);


        



        // $sessions = Leads::where([['client_id', Auth::user()->client_id], ['Date', $date->toDateString()]])->distinct('e_id')->groupBy('e_id')->get();

        // $consideration = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Considering'], ['Date', $date->toDateString()]])->distinct('e_id')->groupBy('e_id')->get();

        // $converted = Converted::where([['client_id', Auth::user()->client_id], ['conversion', '1'], ['Date', $date->toDateString()]])->distinct('e_id')->groupBy('e_id')->get();

        // $deciding = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Deciding'], ['Date', $date->toDateString()]])->distinct('e_id')->groupBy('e_id')->get();

        




        // $sessions = Leads::where('client_id', Auth::user()->client_id)->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->take(50)->get();

        // $consideration = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Considering']])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->take(50)->get();

        // $converted = Converted::where([['client_id', Auth::user()->client_id], ['conversion', '1']])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->take(50)->get();

        // $deciding = Leads::where([['client_id', Auth::user()->client_id], ['Stage', 'Deciding']])->distinct('e_id')->groupBy('e_id')->orderBy('Date', 'DESC')->take(50)->get();

        




        $anonymous_leads = Leads::where('client_id', Auth::user()->client_id)->count(); //12109

        //Total Anonymous Leads
        $total_cookies = Leads::select(DB::raw('count(DISTINCT e_id) as cookies'))->where('client_id', Auth::user()->client_id)->first(); 

        //Leads Converted
        $deleted_cookies = Leads::select(DB::raw('count(e_id) as deletedcookies'))->where([['client_id', Auth::user()->client_id], ['conversion', '1']])->first(); //609
        
        //Total Anonymous Sessions who delete cookies
        $anonymous_leads_delcookie = Leads::select(DB::raw('count(e_id) as count'))->where([['client_id', Auth::user()->client_id],['has_cookies', 'false']])->first();
         //Total Anonymous Leads who delete cookies
        $total_cookies_delcookie = Leads::select(DB::raw('count(DISTINCT e_id) as cookies'))->where([['client_id', Auth::user()->client_id], ['has_cookies','false']])->first();
         //Leads Converted
        $deleted_cookies_delcookie = Leads::select(DB::raw('count(e_id) as deletedcookies'))->where([['client_id', Auth::user()->client_id], ['conversion', '1'], ['has_cookies', 'false']])->first();        
        
        $blue_lead1 = Leads::select(DB::raw('count(DISTINCT e_id) as count'))->where([['client_id', Auth::user()->client_id], ['has_cookies', 'false']])->first(); //2966

        $blue_lead2 = ReturnUsers::select(DB::raw("count(DISTINCT e_id) as count"))->where('client_id', Auth::user()->client_id)->first();    //7752

        if($blue_lead1->count == 0 || $blue_lead2->count == 0){
            $blue_lead3 = 0;
        }else{
           $blue_lead3 = $blue_lead1->count / $blue_lead2->count; 
       }            

        $blue_lead = $blue_lead3 * 100; 
        
        $false = Leads::where([['client_id', Auth::user()->client_id], ['allow_cookies', 'false']])->count();
        $na = Leads::where([['client_id', Auth::user()->client_id], ['allow_cookies', 'N/A']])->count();

        $totalusers = Leads::select(DB::raw('count(e_id) as count'))->where('client_id', Auth::user()->client_id)->first();
        $red_lead1 = $false + $na;
        if($red_lead1 == 0 || $totalusers->count == 0){
             $red_lead2 = 0;
        }else{
            $red_lead2 = $red_lead1 / $totalusers->count;
        }
        
        $red_lead = $red_lead2 * 100;
        $green_lead = 100 - $blue_lead + $red_lead;

        $barchart = Leads::select(DB::raw('month, count(e_id) as count, count(DISTINCT e_id) as visitors, Date'))->where('client_id', Auth::user()->client_id)->groupBy(DB::raw('WEEK(Date)'))->get();
        

        $total_leads = Leads::where('client_id', Auth::user()->client_id)->distinct('e_id')->groupBy('e_id')->count();

        $hadAdblock = Leads::where([['client_id', Auth::user()->client_id],['hasAdblock' , '=', 'true']])->count('hasAdblock');

        $noAdBlock = Leads::where([['client_id', Auth::user()->client_id],['hasAdblock' , '=', 'false']])->count('hasAdblock');

        $csum = Content::where('client_id', Auth::user()->client_id)->sum('Value');

        $converted_content = Content::where('client_id', Auth::user()->client_id)->orderBy('Value', 'DESC')->take(3)->get();
 
        $channels = Channels::orderBy('Value', 'DESC')->where('client_id', Auth::user()->client_id)->take(3)->get();
        $chan_sum = Channels::where('client_id', Auth::user()->client_id)->sum('Value');        

        $today = Carbon::now();

        $lead_detail = Content::where([['client_id', Auth::user()->client_id],['Date', '>', DB::raw('date_sub(now(), INTERVAL 1 WEEK)') ]])->orderBy('Value', 'DESC')->take(3)->get(); 
        $sum = Conversions::where('client_id', Auth::user()->client_id)->sum('Value');

        $conversion = Conversions::where([ ['client_id', '=', Auth::user()->client_id], ['conversion', '=', '1'], ])->take(3)->get();

        //time to query the database after every 5 minutes
        //SELECT * FROM `MetUsers` INNER JOIN UserDetail ON UserDetail.e_id = MetUsers.e_id where time > date_sub(now(), INTERVAL 30 Minute) AND UserDetail.client_id = 004
          // $notification = Leads::join('dbData.UserDetail', 'UserDetail.e_id', '=', 'LeadDNA2.e_id')->where([['UserDetail.time', '>', 'date_sub(now(), INTERVAL 30 Minute)'], ['UserDetail.client_id', '=', Auth::user()->client_id]])->get();

          // echo $notification;
        //get the logo from the database
        $logo = user_info::select(DB::raw("logo"))->where('user_id', Auth::user()->id)->first();

        if(Auth::user()->client_id == 0 || Auth::user()->client_id == ' '){
            return view('lead_error');
        }else{

        return view('leads', [
            'sessions' => $sessions,
            'lead_detail' => $lead_detail,
            'sum' => $sum,
            'conversion' => $conversion,
            'converted_content' => $converted_content,
             'csum' => $csum,
             'green_lead' => $green_lead,
             'blue_lead' => $blue_lead,
             'red_lead' => $red_lead,
             'channels' => $channels,
             'chan_sum' => $chan_sum,
             'consideration' => $consideration,
             'converted' => $converted,
             'total_leads' => $total_leads,
             
             'anonymous_leads' => $anonymous_leads,
             'total_cookies' => $total_cookies,
             'deleted_cookies'=>$deleted_cookies,
             'anonymous_leads_delcookie' => $anonymous_leads_delcookie,
             'total_cookies_delcookie' => $total_cookies_delcookie,
             'deleted_cookies_delcookie'=>$deleted_cookies_delcookie,

             'deciding' => $deciding,
             'barchart' => $barchart,
             'logo' => $logo
            ]);    
        }   
    }
    
    public function topcontentfilter(Request $request ){
        $filterdate=$request['filterdate'];
        // $top_contents = Content::where([['client_id', '004'],['Date','>=', $filterdate]])->groupBy('PageName')->orderBy('Value', 'DESC')->take(3)->get();
 
        $top_contents = Content::selectRaw('PageName,Date,score,PageURL, sum(Value) as sum,round(avg(score),1) as avgscore')->where([['client_id', Auth::user()->client_id],['Date','>=', $filterdate]])->groupBy('PageName')->orderBy('sum', 'DESC')->take(3)->get();
 
       // $top_contents = Content::selectRaw('PageName,Date,score,PageURL, sum(Value) as sum')->where([['client_id', Auth::user()->client_id],['Date','>=', $filterdate]])->groupBy('PageName')->orderBy('sum', 'DESC')->take(3)->get();
 

        echo json_encode($top_contents);

    }


}
