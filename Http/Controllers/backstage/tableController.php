<?php

namespace App\Http\Controllers\backstage;

use App\City;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Dentist;
use App\Event;
use DB;
use App\Nationality;
use App\Hospital;
use Auth;
use Session;
use Carbon\Carbon;

use App\Service;
use App\Dentist_calander;
use App\Offer;


class tableController extends Controller
{
    protected $_per_page = 20;

    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission')->except('permission','store','update','search');

    }

    public function index()
    {
        
        
        $service = Service::all()->count();
        $order = Event::count();
        $hospital = Hospital::all()->count();
        $dentist = Dentist::all()->count();
        $dentistMale = Dentist::where('gender','Male')->count();
        $dentistFemale = Dentist::where('gender','Female')->count();
        $dentist1 = Dentist::where('dgree','1')->count();
        $dentist2 = Dentist::where('dgree','2')->count();
        $dentist3 = Dentist::where('dgree','3')->count();
        $dentist4 = Dentist::where('dgree','4')->count();
        $dentist5 = Dentist::where('dgree','5')->count();
        $dentist6 = Dentist::where('dgree','6')->count();
        $dentist7 = Dentist::where('dgree','7')->count();
        $eastern  = Dentist::where('hospital','7' )->where('hospital','19' )->count();
        $Western = Dentist::where('hospital','2' )->where('hospital','10' )->where('hospital','12' )->where('hospital','15' )->where('hospital','26' )->where('hospital','28' )->where('hospital','31' )->count();
        $user = User::all()->count();
        $usersSud = User::with('city')->where('admin', '=', 2)->where('nationality',194)->count();
        $usersnotSud = User::with('city')->where('admin', '=', 2)->where('nationality','!=',194)->count();
        $usersMale = User::where('gender','Male')->count();
        $usersFemale = User::where('gender','Female')->count();
        $easternUser  = User::where('city_id','7' )->where('city_id','19' )->count();
        $WesternUser = User::where('city_id','2' )->where('city_id','10' )->where('city_id','12' )->where('city_id','15' )->where('city_id','26' )->where('city_id','28' )->where('city_id','31' )->count();
        $dentist_calander = Dentist_calander::all()->count();
        $Available = Event::where('event_date', '>', Now() )->where('status', 0)->count();
        
        
        $event = Event::all()->count();
        $pending =Event::where('status', 0)->count();
        $waitDo =Event::where('status',1)->count();
        $DoneCl =Event::where('status',2)->count();
        $DonOr =Event::where('status',5)->count();
        $CancelDo =Event::where('status',3)->count();
        $CancelCl =Event::where('status',6)->count();
        $cancel = $CancelDo + $CancelCl;

        $date = date("Y-m-d");
        $upcoming =Event::where('event_date', '>', $date)->count();
        $prev = Event::where('event_date', '<', Carbon::now()->toDateString())->count();
        
        
        $offer = Offer::all()->count();
        $gender=Dentist::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->get();
        $dgree=Dentist::select('dgree', DB::raw('count(*) as total'))->groupBy('dgree')->get();
        $city=Dentist::select('city_id', DB::raw('count(*) as total'))->groupBy('city_id')->get();
        $gendePation=User::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->get();
        $cityPation=User::select('city_id', DB::raw('count(*) as total'))->groupBy('city_id')->get();
        $eventHospital=Event::select('hospital_id', DB::raw('count(*) as total'))->groupBy('hospital_id')->get();
        $users = User::with('city')->where('admin', '=', 2)->where('nationality',194)->orderBy('id','Desc')->paginate(20);
        //	var_dump($users);
        return view('backstage.table.index', compact(['cancel','DonOr','DoneCl','waitDo','Available','event','user','usersFemale','usersMale','WesternUser','easternUser','service','hospital','eastern','Western','dentist','dentist1','dentist2','dentist3','dentist4','dentist5','dentist6','dentist7','dentistMale','dentistFemale','dentist_calander','usersSud','offer','gender','dgree','city','usersnotSud','gendePation','cityPation','pending','prev','upcoming','order','eventHospital']))->with('_per_page', $this->_per_page);

    }


}
