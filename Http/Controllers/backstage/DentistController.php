<?php

namespace App\Http\Controllers\backstage;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Dentist;
use App\Event;
use DB;
use App\Nationality;
use App\City;
use App\Hospital;
use Auth;
use Session;
use Carbon\Carbon;

class DentistController extends Controller
{
    protected $_per_page = 20;

    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission')->except('permission','store','update','search');
    }

    public function index()
    {
        $objects = Dentist::with('city')->orderBy('id', 'Desc')->get();
        //dd($objects);
        return view('backstage.dentists.index', compact('objects'));
    }

    public function add($id = null)
    {
        $nationalitys = Nationality::all();
        $cities = City::all();
        $hospitals = Hospital::all();
        if ($id) {
            $aDentist = Dentist::find($id);

            return view('backstage.dentists.edit')->with(['aDentist' => $aDentist,'cities'=>$cities, 'nationalitys' => $nationalitys, 'hospitals' => $hospitals]);
        }
        return view('backstage.dentists.edit')->with(['nationalitys' => $nationalitys,'cities'=>$cities, 'hospitals' => $hospitals]);
    }
    
     public function deleteimg(request $request,$photo,$ids)
    {
        
        
        
      
       
        if ($ids) {
          
            DB::table('dentists')
                ->where('id', $ids)
                ->update([$photo => NULL]);
           
           
       
            
        $request->session()->flash("message", "تم ازالة الصور بنجاح");

       return redirect('/home/dentists/add/'. $ids);

        }
    }

    public function store(request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'mobile' => 'required|numeric|regex:/(05)[0-9]{8}/|unique:dentists',
                'nation_id' => 'required|digits:10|numeric|regex:/(1)[0-9]{9}/',
                'email' => 'required|string|email|max:255|unique:dentists',
                'password' => 'required|string|min:6',
                'dgree' => 'required|numeric',
                'birthdate' => 'required|date',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]
        );
        $result = '';
        for ($i = 0; $i < 9; $i++) {
            $result .= mt_rand(0, 9);
        }
         $len = 5;
         $txt = "";
        for ($i = 0; $i < $len; $i++) {
                    //   $txt .=substr($str, rand(0, strlen($str)), 1);
                    $txt .= mt_rand(0, 9);
                }
        $Dentist = new Dentist;
        $Dentist->name = $request->name;
        $Dentist->active = 1;
        $Dentist->email = $request->email;
        $Dentist->password = bcrypt($request->password);
        $Dentist->mobile = $request->mobile;
        $Dentist->nationality = $request->nationality;
        $Dentist->gender = $request->gender;
        $Dentist->nation_id = $request->nation_id;
        $Dentist->city_id = $request->city_id;
        $Dentist->code = $txt;
        $Dentist->dgree = $request->dgree;
        $Dentist->hospital = $request->hospital;
        $Dentist->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
        $Dentist->otp = $result;
        $Dentist->api_token = Str::random(60);

        if ($request->photo) {
            $name = time() . '.' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('/images'), $name);
            $Dentist->photo = $name;
        }
        if ($request->profile_photo) {
            $name = time() . '.' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->move(public_path('/images'), $name);
            $Dentist->profile_photo = $name;
        }
        // $Dentist->created_by ='0';
        $Dentist->save();
        $request->session()->flash("message", "Dentist added successfully");

        return redirect('/home/dentists');
    }

    public function update(request $request, $id)
    {
       
        $Dentist = Dentist::find($id);
        $Dentist->name = $request->name;
        $Dentist->email = $request->email;

       
        if ($request->password) {
            $Dentist->password = bcrypt($request->password);
        }
        $Dentist->mobile = $request->mobile;
        $Dentist->nationality = $request->nationality;
        $Dentist->gender = $request->gender;
        $Dentist->nation_id = $request->nation_id;
        $Dentist->city_id = $request->city_id;
        $Dentist->dgree = $request->dgree;
        $Dentist->hospital = $request->hospital;
        $Dentist->note = $request->note;

        $Dentist->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
        $Dentist->api_token = Str::random(60);

        if ($request->photo) {
            $name = time() . '.' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('/images'), $name);
            $Dentist->photo = $name;
        }
        if ($request->profile_photo) {
            $name = time() . '.' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->move(public_path('/images'), $name);
            $Dentist->profile_photo = $name;
        }
        $Dentist->update();
        $request->session()->flash("message", "Dentist edit successfully");

        return redirect('/home/dentists/add/'.$id);
    }
    
    public function activate(request $request, $id)
    {
       
        $Dentist = Dentist::find($id);
        
        $Dentist->active = "1";
        
        $Dentist->update();
        $request->session()->flash("message", "Dentist Activated successfully");

        return redirect('/home/dentists');
    }

    public function disable(request $request, $id)
    {
       
        $Dentist = Dentist::find($id);
        
        $Dentist->active = "0";
        
        $Dentist->update();
        $request->session()->flash("message", "Dentist Disabled successfully");

        return redirect('/home/dentists');
    }
    public function destroy($id)
    {
        Dentist::find($id)->delete();
        DB::table('dentist_calanders')->where('dentist_id', $id)->delete();
        DB::table('events')->where('dentist_id', $id)->delete();
        DB::table('lexx_messages')->where('user_id', $id)->where('type', 1)->delete();
        DB::table('lexx_participants')->where('user_id', $id)->where('type', 1)->delete();
        Session::flash("message", "Dentist deleted");

        return redirect()->back();
    }

    public function search(request $request)
    {
        $objects = Dentist::where('name', 'LIKE', '%' . $request->Dentist_s . '%')
            ->orwhere('email', 'LIKE', '%' . $request->Dentist_s . '%')
            ->orwhere('mobile', 'LIKE', '%' . $request->Dentist_s . '%')->paginate($this->_per_page);
        return view('backstage.dentists.index', compact('objects'))->with('_per_page', $this->_per_page);
    }

    public function permission(request $request)
    {
        per_Dentist::where('Dentist_id', $request->Dentist_id)->delete();

        foreach ($request as $k => $v) {
            if ($k == 'Dentist_id' || $k == '_token') {
                continue;
            }

            $per_Dentist = new per_Dentist;
            $per_Dentist->permission_id = $v;
            $per_Dentist->Dentist_id = $request->Dentist_id;
            $per_Dentist->save();
        }
        Session::flash("message", "تم اضافة الصلاحيات");

        return redirect()->back();
    }
}
