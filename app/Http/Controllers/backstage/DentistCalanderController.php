<?php

namespace App\Http\Controllers\backstage;

use App\Dentist_calander;
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

class DentistCalanderController extends Controller
{
    protected $_per_page = 20;

    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission')->except('permission','store','update','search');

    }

    public function index(Request $request)
    
    {
        $search = $request->search;
        // $n = Dentist::where('name', 'LIKE', '%' . $search . '%')->orWhere('en_name', 'LIKE', '%' . $search . '%')->pluck('name');
        
        if($request->search){
            $objects = Dentist_calander::whereHas('dentist', function($q) use($search){
                $q->where('name', 'LIKE', '%' . $search . '%')->orWhere('en_name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('Hospital', function($q) use($search){
                $q->where('hospital_name_ar', 'LIKE', '%' . $search . '%')->orWhere('hospital_name_en', 'LIKE', '%' . $search . '%');
            })
            ->orWhere('start_date',$search)
            ->orderBy('id','Desc')->paginate(20);
            
            return view('backstage.dentists.calendars', compact('objects','request'))->with('_per_page', $this->_per_page);
        }else{
            $objects = Dentist_calander::with('dentist','hospital','service')->orderBy('id','Desc')->get();
            return view('backstage.dentists.calendars', compact('objects'))->with('_per_page', $this->_per_page);

         }
    }
}
