<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Event;
use App\Offer;
use App\Dentist;
use App\Service;
use App\Hospital;
use Carbon\Carbon;
use App\Dentist_calander;
use Illuminate\Http\Request;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $service = Service::all()->count();
        $order = Event::count();
        $hospital = Hospital::all()->count();
        $dentist = Dentist::all()->count();
        $dentistMale = Dentist::where('gender','Male')->count();
        $pending =Event::where('event_date', '>', Carbon::now()->toDateString())->where('status', 0)->count();
                $date = date("Y-m-d");
        $upcoming =Event::where('event_date', '>', $date)->count();
        $prev = Event::where('event_date', '<', Carbon::now()->toDateString())->count();
        $dentist_calander = Dentist_calander::all()->count();
        $usersSud = User::with('city')->where('admin', '=', 2)->where('nationality',194)->count();
        $usersnotSud = User::with('city')->where('admin', '=', 2)->where('nationality','!=',194)->count();
        $offer = Offer::all()->count();
        $gender=Dentist::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->get();
        $dgree=Dentist::select('dgree', DB::raw('count(*) as total'))->groupBy('dgree')->get();
        $city=Dentist::select('city_id', DB::raw('count(*) as total'))->groupBy('city_id')->get();
        $gendePation=User::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->get();
        $cityPation=User::select('city_id', DB::raw('count(*) as total'))->groupBy('city_id')->get();
        $eventHospital=Event::select('hospital_id', DB::raw('count(*) as total'))->groupBy('hospital_id')->get();


       // var_dump($gender);
        return view('home',compact(['service','hospital','dentist','dentistMale','dentist_calander','usersSud','offer','gender','dgree','city','usersnotSud','gendePation','cityPation','pending','prev','upcoming','order','eventHospital']));
    }
}
