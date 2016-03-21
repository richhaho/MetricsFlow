<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\LeadDNA as Leads;
use App\Contentspage as Contentspage;
use App\UserInfo as user_info;
use App\newContents as newContents;
use App\ContentStage as ContentStage;
use App\Conversions as ConversionPage;

use Carbon;
use Auth;
use Redirect;


class ContentsController extends Controller
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
    public function showAllContents(Request $request){
        
        $today = Carbon\Carbon::now();
        $contents_new = newContents::where('client_id', Auth::user()->client_id)->orderBy('Date', 'DESC')->take(10)->get(); //["Date", $today->toDateString()]
        $contents_aware = ContentStage::where([['client_id', Auth::user()->client_id],['Stage', 'Awareness']])->orderBy('Date', 'DESC')->take(10)->get(); //["Date", $today->toDateString()]
        $contents_engaged = ContentStage::where([['client_id', Auth::user()->client_id],['Stage', 'Engaged']])->orderBy('Date', 'DESC')->take(10)->get();
        $contents_conv = ConversionPage::where('client_id', Auth::user()->client_id)->orderBy('Value', 'DESC')->take(10)->get();
 

        $logo = user_info::select(DB::raw("logo"))->where('user_id', Auth::user()->id)->first();

        return view('allcontents', [
             'logo' => $logo,
             'contents_new'=>$contents_new,
             'contents_aware'=>$contents_aware,
             'contents_engaged'=>$contents_engaged,
             'contents_conv'=>$contents_conv,


            ]);       
    }
    
   }