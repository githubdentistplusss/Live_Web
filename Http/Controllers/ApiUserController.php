<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Route;
use Session;
use App\City;
use App\User;
use App\Event;
use App\Dentist;
use App\Follower;
use App\contactus;
use App\Setting;

use App\Hospital;
use Carbon\Carbon;
use App\Nationality;
use App\Http\Requests;
use Illuminate\Support\Str;
use App\Mail\ForgetPassword;
use App\Mail\ContactMail;

use Illuminate\Http\Request;
use App\Services\UnifonicClient;
use Illuminate\Support\Facades\Mail;

class ApiUserController extends Controller
{
    private $unifonicClient;

    public function __construct(UnifonicClient $unifonicClient)
    {
        $this->unifonicClient = $unifonicClient;
    }

    public function logout(Request $request)
    {
        auth('api')->logout();
        return response()->json(['status'=>'Logout successefuly']);
    }
    public function Login(Request $request)
    {
        if (Auth::attempt(['mobile' => $request->mobile,'password' => $request->password , 'admin' => '2', 'active' => '1'])) {
            $client = User::where('mobile', $request->mobile)->first();

            DB::table('events')
              ->where('user_id', $client->id)
              ->update(['device_id'=>$request->device_id]);

            DB::table('users')
              ->where('id', $client->id)
              ->update(['device_id'=>$request->device_id]);

            DB::table('dentists')
                ->where('device_id', $request->device_id)
                ->update(['device_id' => ""]);

            return response()->json(['status'=>'success','data'=>$client]);
        } else {
            return response()->json(['status'=>'Please enter your login data']);
        }
    }
    public function deleteDevice(Request $request)
    {
        $device_id = "";

        DB::table('events')
              ->where('user_id', $request->user_id)
             ->update(['device_id'=>$device_id]);

        DB::table('users')
             ->where('id', $request->user_id)
             ->update(['device_id'=>$device_id]);

        return response()->json(['status'=>'success']);
    }
    public function registerAction(Request $request)
    {
        $user_check = User::where('mobile', $request->mobile)->where('active', 0)->first();
        if ($user_check) {
            User::where('mobile', $request->mobile)
         ->where('active', 0)->first()->delete();
        }
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',

                'mobile'     => 'required|numeric|regex:/(05)[0-9]{8}/|unique:users',
                
                'password'   => 'required|string|min:6',
                


            ]
        );

        if ($request->password) {
            $result = '';
            //   for($i = 0; $i < 4; $i++) {
            //   	 $result .= mt_rand(0, 9);
            //   }
            $result='3749';
            $client = User::create([
                'name'    => $request->name,
                //*'city_id'       => $request->city_id ? $request->city_id : 0,
                //*'email'         => $request->email,
                'mobile'        => $request->mobile,
                //*'nationality'        => $request->nationality == 0 ? 248: $request->nationality,
                'birthdate'        => Carbon::parse($request->age)->format('Y-m-d'),
                //*'gender'        => $request->gender,
                'admin'        => 2,
                'otp'        => intval($result),
                'password'      => bcrypt($request->password),
                'api_token' => Str::random(60),

            ]);

            if ($client) {

         //       Auth::attempt(['mobile' => $request->mobile,'password' => $request->password ]);
                $message = "Dentist Pluss - your code ".$result."";
                $msg  = iconv("UTF-8", "Windows-1256", $message);
                $msg = urlencode($msg);
                $number = $request->mobile;
                // echo file_get_contents($url);
  $n = intval(ltrim($number, '0')); // integer
$pfx='966';
                $number = $pfx.$n;
                //   $url="http://apps.gateway.sa/sendurl.aspx?user=FreeDentist&pwd=0580580373&senderid=FREEDENTIST&CountryCode=All&msgtext=$msg&mobileno=$number";
                $url="https://apps.gateway.sa/vendorsms/pushsms.aspx?user=FreeDentist&password=0580580373&msisdn=$number&sid=FREEDENTIST&msg=$msg&fl=0&dc=8";
                $last_id = DB::table('users')->latest('id')->first();

                if (file_get_contents($url)) {
                    //return response()->json(['status'=>'Code send successefuly']);}
                    return response()->json(['data'=>$client,'status'=>'Code send successefuly']);
                }
            } else {
                return response()->json(['status'=>'Error']);
            }
        } else {
            return response()->json(['status'=>'Error']);
        }
    }

    public function userLoginFTime(Request $request)
    {

            //Auth::user();
        //  Auth::guard('admin')->user();
        $this->validate(
            $request,
            [


                'otp'   => 'required|numeric',

            ]
        );
        $client = User::where('otp', $request->otp)->where('admin', 2)->first();
        if ($client) {
            $client->active = 1;

            $client->update();
            /* $client = auth()->user();
        $client->api_token = str_random(60);
        $client->save();*/
            /*  if(Auth::attempt(['mobile' => $client->mobile,'password' => $client->password , 'admin' => '2', 'active' => '1'])){*/
            return response()->json(['status'=>'success','data'=>$client]);
        //  return $client;

       // }
        } else {
            return response()->json(['status'=>'Please enter your login data']);
        }
    }

    public function account(request $request )
    {
        if (!$request->user_id) {
            return response()->json(['status'=>'Please login']);
        }
        $client = User::find($request->user_id);
        $user = User::where('id', $request->user_id)->first();
        $nationalitys = DB::table('nationalities')

        ->where('id', $user->nationality)
            ->get();
            
            $allnationalitys = DB::table('nationalities')->get();

        //$hospitals = Hospital::all();
        $followers = DB::table('followers')
        ->where('user_id', $request->client_id)
        ->count();

        $client_city_ar = isset($client->city)?$client->city->city_name_ar:null;
        $client_city_en = isset($client->city)?$client->city->city_name_en: null;

        return response()->json(['all'=>$allnationalitys,'data'=>$user, 'online_status' => $client->isOnline(),'client'=>$client,
         'client_city_ar' => $client_city_ar,'client_city_en' => $client_city_en,
         'followers'=>$followers,'status'=>'success']);
    }

    public function forgetPassword2(Request $request)
    {
        if (!$request->has('email')) {
            return response()->json(['status'=>'Missing Email']);
        }

        $email = $request->input('email');

        $clientEmail = User::where('email', $email)
            ->where('admin', 2)

            ->first();
        if (!empty($clientEmail)) {

         //   $data2 = array();
            $data2 = new User();
            $data2->email = $email;
            $newPassword = rand("100000", "999999");
            $message = "Your Password".$newPassword."";
            $data2->message = $message;

            $data = ['password'=> bcrypt($newPassword)];
            DB::table('users')
                ->where('id', $clientEmail->id)
                ->update($data);

            Mail::to($email)->send(new ForgetPassword($data2));


            if (count(Mail::failures()) > 0) {
                $failuresArr = array();
                foreach (Mail::failures() as $email_address) {
                    $failuresArr[] = $email_address;
                }
                return response()->json(['status' => 'Error',  'data' => $failuresArr]);
            } else {
                return response()->json(['status' => 'success', 'data' => $newPassword]);
            }
        } else {
            return response()->json(['status' => 'Email Not found']);
        }
    }

    public function forgetPassword(Request $request)
    {
        if (!$request->mobile) {
            return response()->json(['status'=>'Missing mobile']);
        }

        $mobile = $request->mobile;

        $clientEmail = User::where('mobile', $mobile)
             
            ->first();
        if (!empty($clientEmail)) {

         //   $data2 = array();
            $data2 = new User();
            $data2->mobile = $mobile;
            $newPassword = rand("100000", "999999");
            $message = "Dentist Pluss : your new Password  ".$newPassword."";
            $data2->message = $message;

            $data = ['password'=> bcrypt($newPassword)];
            DB::table('users')
                ->where('id', $clientEmail->id)
                ->update($data);
            $msg  = iconv("UTF-8", "Windows-1256", $message);

            $number = $mobile;


            $n = intval(ltrim($number, '0')); // integer
            $pfx='966';
            $number = $pfx.$n;
            
            $url="https://sms.malath.net.sa/httpSmsProvider.aspx?username=dentistpluss&password=0566@DentistPluss.com&mobile=$number&unicode=none&message=$msg&sender=DENTISTPLUS";
      







 return response()->json(['data' =>$url]);
        }
    }
    
     public function resetpassword(Request $request)
    {
          if (Auth::attempt(['mobile' => $request->mobile,'password' => $request->password , 'admin' => '2', 'active' => '1'])) {
              
               $client = User::find($request->user_id);
              
              $client->password = bcrypt($request->new_password);
               $client->update();
            return response()->json(['status' => 'تم تغير كلمة السر']);
              
          }
        else
        {
              return response()->json(['status' =>'كلمة السر القديمة غير صحيحة']);
             
        }
        
    }

    public function profileAction(Request $request)
    {
        $client = User::find($request->user_id);




        $client->name = $request->name;
        $client->email = $request->email;
        if($client->gender=="1")
        {
             $client->gender = "female";
        }
        else
        {
             $client->gender = "male";
        }
       

        if ($request->city_id) {
            $client->city_id = $request->city_id;
        }
        
         if ($request->nation) {
            $client->nationality = $request->nation;
        }

        if ($client) {
            $client->update();

            return response()->json(['status'=>'Updated successefuly','data'=>$client]);
        } else {
            return response()->json(['status'=>'Error']);
        }
    }

    public function countries()
    {
        $data = Nationality::get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }


    public function cities()
    {
        $data = City::get();
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    
    public function terms()
    {
        $settingAr = Setting::where('setting_name', 'app_terms_ar')->pluck('setting_value')->first();
        $settingEn = Setting::where('setting_name', 'app_terms_en')->pluck('setting_value')->first();
        $data = [];
        $data['setting_ar'] = $settingAr;
        $data['setting_en'] = $settingEn;
        return response()->json(['status' => 'success', 'data' => $data]);
    }

    public function contact(Request $request)
    {
        $contactus = new contactus;
        $contactus->contact_name= $request->contact_name;
        $contactus->contact_mobile= $request->contact_mobile;
        $contactus->contact_email= $request->contact_email;
        $contactus->contact_message= $request->contact_message;
        //	exit();
        $contactus->save();

        $data2 = new User();
        $data2->email = $request->contact_email;
        $data2->mobile = $request->contact_mobile;
        $data2->name = $request->contact_name;
        $data2->message = $request->contact_message;

        $settingEmail = Setting::where('setting_name', 'site_email')->pluck('setting_value')->first();


        Mail::to($settingEmail)->send(new ContactMail($data2));


        if (count(Mail::failures()) > 0) {
            $failuresArr = array();
            foreach (Mail::failures() as $email_address) {
                $failuresArr[] = $email_address;
            }
            $message = (app()->getLocale()=='en') ? "Your Message has not been sent " : "تعذر ارسال رسالتكم ";
        // Session::flash("message", $message);
        return redirect('contact')->with('status', $message);
        } else {
            $message = (app()->getLocale()=='en') ? "Your Message has been sent successfully" : "تم إرسال رسالتكم بنجاح";
        // Session::flash("message", $message);
        return redirect('contact')->with('status', $message);
        }
    }

    public function languageUpdate(User $user)
    {
        $user->language = request()->lang;

        if ($user->update()) {
            return response()->json(['status' => 'Updated successefuly', 'data' => $user]);
        } else {
            return response()->json(['status' => 'Error']);
        }
    }
}
