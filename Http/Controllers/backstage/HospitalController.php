<?php

namespace App\Http\Controllers\backstage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hospital;
use App\per_user;
use App\City;
use DB;
use Auth;
use Session;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission')->except('permission','store','update','search');

    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        if($request->search){
            $objects = Hospital::where('hospital_name_ar', 'LIKE', '%' . $search . '%')
            ->orWhere('hospital_name_en', 'LIKE', '%' . $search . '%')
            ->orWhere('hospital_address_ar', 'LIKE', '%' . $search . '%')->orderBy('sort','asc')->paginate(20);
            return view('backstage.hospitals.index', compact('objects'));
        }else{
            $objects = Hospital::orderBy('sort','asc')->get();
           
            return view('backstage.hospitals.index', compact('objects'));
        }

    }

    public function add($id = null)
    {
        $citys = City::get();
        if ($id) {
            $object = Hospital::find($id);
            return view('backstage.hospitals.edit', compact('object', 'citys'));
        }
        return view('backstage.hospitals.edit', compact('citys'));
    }

    public function store(request $request)
    {

        $this->validate($request, [
            'hospital_name_ar' => 'required|string|max:255',
            'hospital_name_en' => 'required|string|max:255',
            'hospital_address_en' => 'required|string|max:255',
            'hospital_address_ar' => 'required|string|max:255',

        ]);
        $hospital = new Hospital;
        $hospital->hospital_name_ar = $request->hospital_name_ar;
        $hospital->hospital_name_en = $request->hospital_name_en;
        $hospital->hospital_address_ar = $request->hospital_address_ar;
        $hospital->hospital_address_en = $request->hospital_address_en;
        $hospital->latitude = $request->latitude;
        $hospital->longitude = $request->longitude;
        $hospital->req_map_location = $request->req_map_location;
        $hospital->city_id = $request->city_id;
        $hospital->sort = $request->sort;
        $hospital->active = ($request->active == null)?0:1;


        // $user->created_by ='0';
        $hospital->save();
        $request->session()->flash("message", "Hospital added successfully");

        return redirect('/home/hospitals');
    }

    public function update(request $request, $id)
    {

        $hospital = Hospital::find($id);
      
        $data = $request->all();

        if($request->active == null)
        $data = array_merge($data,['active' => 0]);

        $hospital->update($data);
        $request->session()->flash("message", "Hospital update successfully");

        return redirect('/home/hospitals');

    }

    public function destroy(Request $request,$id)
    {
        Hospital::find($id)->delete();
        $request->session()->flash("message", "Hospital Deleted ");

        return redirect()->back();
    }
    
    // public function search(Request $request){
        
    //     $search = $request->input('search');
    //     if($request->search){
    //         dd('dd');
    //         $objects = Hospital::where('hospital_name_ar', 'LIKE', '%' . $search . '%')->get();
    //         return view('backstage.hospitals.index', compact('objects'));
    //     }else{
    //         dd('ff');
    //         $objects = Hospital::orderBy('id','Desc')->paginate(20);
    //         return view('backstage.hospitals.index', compact('objects'));
    //     }
        
    //     // dd($Hospital);
    // }
}
