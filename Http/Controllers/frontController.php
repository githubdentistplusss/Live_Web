<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

use Auth;
use DB;
use Session;
use Validator;
use Input;
use Calendar;
use App\Event;
use App\User;
use App\Dentist;
use App\Follower;
use App\Treatment;
use App\Service;
use App\Hospital;
use App\City;
use App\Setting;
use App\Page;
//use Illuminate\Support\Facades\Session;


class frontController extends Controller
{

    public function index()
    {

        
        $this->data['cities'] = City::all();
        $this->data['hospitals'] = Hospital::orderBy('sort', 'asc')->get();
        $this->data['followers'] = Follower::all();
        $this->data['services'] = Service::orderBy('sort', 'asc')->get();
        $this->data['dentists'] = Dentist::all();
        $this->data['offers'] = DB::table('offers','clinics')->join('clinics','offers.clinic_id','clinics.clinic_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->limit(10)->inRandomOrder()->get();
       
        return view('views.index', $this->data);
    }



    public function aboutUs()
    {

        $sets = array();
        $settings = Setting::all();
        foreach ($settings as $set) {
            $sets[$set->setting_name] = $set->setting_value;
        }

        $aboutus = Page::where('page_id', 1)->first();


        return view('views.about')->with(['aboutus' => $aboutus,  'sets' => $sets]);
    }

    public function Privacy()
    {


        $privacy = Page::where('page_id', 2)->first();

        return view('views.privacy')->with(['privacy' => $privacy]);
    }
    
     public function termsdentist()
     {
          return view('views.terms-dentists');
     }
    
    
    public function terms()
    {

        $sets = array();
        $settings = Setting::all();
        foreach ($settings as $set) {
            $sets[$set->setting_name] = $set->setting_value;
        }

        $aboutus = Page::where('page_id', 7)->first();


        return view('views.terms')->with(['aboutus' => $aboutus,  'sets' => $sets]);
    }
}
