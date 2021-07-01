<?php

namespace App\Http\Controllers;

use DB;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function selectDentist(Request $request)
    {
        if ($request->ajax()) {
            //echo $request->hospital_id;
            //exit();
            $dentists = DB::table('dentist_calanders')
    ->join('services', 'dentist_calanders.service_id', '=', 'services.id')
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->pluck("services.service_name_en", "services.id")
    ->all();

            $data = view('ajax-select-2', compact('dentists'))->render();

            return response()->json(['options'=>$data]);
        }
    }

    public function selectDay(Request $request)
    {
        if ($request->ajax()) {
            //echo $request->hospital_id;
            //exit();
            $days = DB::table('dentist_calanders')
            ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
            ->where('hospitals.active', 1)
    ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->pluck("dentist_calanders.day", "dentist_calanders.day")
    ->all();

            $data = view('ajax-day', compact('days'))->render();

            return response()->json(['options'=>$data]);
        }
    }

    public function selectDate(Request $request)
    {
        $stack = array();

        if ($request->ajax()) {
            $dates = DB::table('dentist_calanders')
                    ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
                    ->where('hospitals.active', 1)
                   ->where('end_date', '>', Carbon::now()->toDateString())
                   ->where('dentist_calanders.start_date', '<=', Carbon::now()->todatestring())
                   ->where('dentist_calanders.service_id', $request->service_id)
                   ->where('dentist_calanders.hospital_id', $request->hospital_id)
                 
                   ->get();
                   
                   
                

            $data = view('ajax-date', compact('dates'))->render();
            //$data2 = view('ajax-time',compact('dates'))->render();

            return response()->json(['dates'=>$data]);
        }
    }

    public function selectHospital(Request $request)
    {
        if ($request->ajax()) {
            //echo $request->hospital_id;
            //exit();
            $hospitals = DB::table('dentist_calanders')
    ->join('hospitals', 'hospitals.id', '=', 'dentist_calanders.hospital_id')
     ->join('dentists', 'dentists.id', '=', 'dentist_calanders.dentist_id')
      ->where('dentist_calanders.service_id', $request->service_id)
    ->where('hospitals.city_id', $request->city_id)
    ->where('hospitals.active', 1)
    ->where('dentists.active', 1)
    ->where('dentist_calanders.start_date', '<=', Carbon::now()->todatestring())
     ->where('dentist_calanders.end_date', '>=', Carbon::now()->todatestring())
    ->orderBy('hospitals.sort', 'asc')
    ->pluck("hospitals.hospital_name_ar", "hospitals.id")
    ->all();

            $data = view('ajax-select-hospital', compact('hospitals'))->render();

            return response()->json(['options'=>$data]);
        }
    }

    public function selectCity(Request $request)
    {
        if ($request->ajax()) {
            //echo $request->hospital_id;
            //exit();
    $cities = DB::table('dentist_calanders')
    ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
    ->join('cities', 'hospitals.city_id', '=', 'cities.id')
    ->join('dentists', 'dentist_calanders.dentist_id', '=', 'dentists.id')
    ->where('dentist_calanders.start_date', '<=', Carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>=', Carbon::now()->todatestring())
    ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentists.active', 1)
    ->pluck("cities.city_name_ar", "cities.id")
    ->all();

            $data = view('ajax-select-city', compact('cities'))->render();

            return response()->json(['options'=>$data]);
        }
    }
}
