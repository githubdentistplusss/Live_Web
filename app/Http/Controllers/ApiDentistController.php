<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Str;

    use App\Http\Requests;
    use App\Dentist;
    use App\Nationality;
    use App\Hospital;
    use Auth;
    use Session;
    use Route;
    use Carbon\Carbon;
    use DB;
    use Illuminate\Support\Facades\Mail;
    use App\Mail\ForgetPassword;
    use App\Services\UnifonicClient;

    class ApiDentistController extends Controller
    {
        private $unifonicClient;

        public function __construct(UnifonicClient $unifonicClient)
        {
            $this->unifonicClient = $unifonicClient;
        }

        public function logout(Request $request)
        {
            auth('dapi')->logout();
            return response()->json(['Logout successefuly']);
        }
        
         public function updatedevice(Request $request)
        {
            DB::table('dentists')
              ->where('id', $request->id)
              ->update(['device_id'=>$request->device_id]);
        }


        public function Login(Request $request)
        {
            if (Auth::guard('dentist')->attempt(['mobile' => $request->mobile, 'password' => $request->password])) {
                $dentist = Dentist::where('mobile', $request->mobile)->first();
                $dentist->device_id = $request->device_id;
                $dentist->update();
                return response()->json(['status' => 'Login successefuly', 'data' => $dentist]);
            } else {
                return response()->json(['Error']);
            }
        }

        public function deleteDevice(Request $request)
        {
            $device_id = "";
            $update = DB::table('dentists')
                ->where('id', $request->dentist_id)
                ->update(['device_id' => $device_id]);

            return response()->json(['status' => 'success']);
        }

        public function registerAction(Request $request)
        {
            $this->validate(
                $request,
                [
                'name' => 'required|string|max:255',

                'mobile' => 'required|numeric|unique:dentists',
                'nation_id' => 'nullable|digits:10',



                'email' => 'required|string|email|max:255|unique:dentists',
                'password' => 'required|string|min:6|confirmed',
                'dgree' => 'required|numeric',
                'birthdate' => 'required|date',
                //'photo' => 'image|mimes:jpeg,png,jpg,gif,svg'

            ]
            );

            $dentist_check = Dentist::where('mobile', $request->mobile)
                ->where('active', 0)->first();
            if ($dentist_check) {
                Dentist::where('mobile', $request->mobile)
                    ->where('active', 0)->first()->delete();
            }

            if ($request->password === $request->password_confirmation) {

                // $result = '';
                // for ($i = 0; $i < 4; $i++) {
                //     $result .= mt_rand(0, 9);
                // }
                $len = 5;
                $txt = "";
                $str = '0123456789';
                for ($i = 0; $i < $len; $i++) {
                    //   $txt .=substr($str, rand(0, strlen($str)), 1);
                    $txt .= mt_rand(0, 9);
                }
                $result='3749';
                //ABCDEFGHIJKLMNOPQRSTUVWXYZ
                $client = new Dentist;
                $client->name = $request->name;
                $client->en_name = $request->en_name;
                $client->email = $request->email;
                $client->mobile = $request->mobile;
                $client->nationality = $request->nationality == 0 ? 248: $request->nationality;

                if ($request->city_id) {
                    $client->city_id = $request->city_id;
                }

                $client->gender = $request->gender;
                $client->nation_id = $request->nation_id;
                $client->dgree = $request->dgree;
                $client->hospital = $request->hospital;
                $client->device_id = $request->device_id;
                $client->birthdate = Carbon::parse($request->birthdate)->format('Y-m-d');
                $client->password = bcrypt($request->password);
                $client->otp = intval($result);
                $client->code = $txt;
                 $client->active = '0';
                $client->api_token = Str::random(60);


                if ($request->hasFile('photo')) {
                    $name = time() . '.' . $request->photo->getClientOriginalName();
                    $request->photo->move(public_path('/images'), $name);
                    $client->photo = $name;
                }
                if ($request->hasFile('profile_photo')) {
                    $name = time() . '.' . $request->profile_photo->getClientOriginalName();
                    $request->profile_photo->move(public_path('/images'), $name);
                    $client->profile_photo = $name;
                }
                $client->save();
                if ($client) {
                    //	echo 'd';
                    //    Auth::guard('dentist')->attempt(['mobile' => $request->mobile,'password' => $request->password ]);
                    //echo $result;
                    $message = "Dentist Pluss - your code " . $result . "";
                    $msg = iconv("UTF-8", "Windows-1256", $message);
                    $msg = urlencode($msg);
                    $number = $client->mobile;
                    //    $url="https://apps.gateway.sa/vendorsms/pushsms.aspx?user=FreeDentist&password=0580580373&msisdn=$number&sid=GW%20Active&msg=$msg&fl=0";
                    $n = intval(ltrim($number, '0')); // integer
                    $pfx = '966';
                    $number = $pfx . $n;
                    // $url = "http://sms.gateway.sa/sendurl.aspx?user=20093022&pwd=058@freedentist.net&senderid=FREEDENTIST&CountryCode=All&msgtext=$msg&mobileno=$number";
                    $url="https://apps.gateway.sa/vendorsms/pushsms.aspx?user=FreeDentist&password=0580580373&msisdn=$number&sid=FREEDENTIST&msg=$msg&fl=0&dc=8";

                    // echo file_get_contents($url);


                    if (file_get_contents($url)) {
                        // return response()->json(['status'=>'Code send successefuly']);}
//                       Session::flash('success_message', 'تم إرسـال كلمة المرور الجديدة الى رقم جوالك');

                        return response()->json(['status' => 'Code send successefuly', 'data' => $client]);
                    }
                } else {
                    return response()->json(['status' => 'Error']);
                }
            } else {
                return response()->json(['status' => 'Error']);
            }
        }

        //check otp
        public function LoginFirstTime(Request $request)
        {
            $this->validate(
                $request,
                [


                    'otp' => 'required|numeric',

                ]
            );
            $dentist = Dentist::where('otp', $request->otp)->first();
            if ($dentist) {
                $dentist->device_id = $request->device_id;
                $dentist->active = 1;

                $dentist->update();
                /* if(Auth::guard('dentist')->attempt(['mobile' => $dentist->mobile,'password' => $dentist->password,'active' => '1'])){*/
                return response()->json(['status' => 'success', 'data' => $dentist]);
            //  }
            } else {
                return response()->json(['Error']);
            }
        }

        public function account(request $request)
        {
            if (!$request->dentist_id) {
                return response()->json(['status' => 'Please Login']);
            }
            $client = Dentist::find($request->dentist_id);
            //	$client = Dentist::get($request->dentist_id)->first();
            // $dentist = Dentist::where('id', $request->dentist_id)->first();
            //	$nationalitys  = Nationality::all();
            // echo $dentist->nationality;
            // echo $dentist->hospital;
            $nationalitys = DB::table('nationalities')
                ->where('id', $client->nationality)
                ->get();

            //	$hospitals  = Hospital::all();
            $hospitals = Hospital::where('id', $client->hospital)->first();
            /*$hospitals = DB::table('hospitals')

          ->where('id',$dentist->hospital)
              ->get();
         */
            $services = DB::table('dentist_calanders')
                ->where('dentist_id', $request->dentist_id)
                ->where('start_date', '>=', Carbon::now()->toDateString())
                ->count();

            $client_city_ar = isset($client->city)?$client->city->city_name_ar:null;
            $client_city_en = isset($client->city)?$client->city->city_name_en: null;

            return response()->json(['nationalitys' => $nationalitys, 'client' => $client, 'online_status' => $client->isOnline(),
             'client_city_ar' => $client_city_ar,'client_city_en' => $client_city_en,
             'hospitals' => $hospitals, 'services' => $services, 'status' => 'success']);
        }


        public function forgetPassword(Request $request)
        {
            if (!$request->has('mobile')) {
                return response()->json(['status' => 'Missing mobile']);
            }

            $mobile = $request->input('mobile');

            $clientEmail = Dentist::where('mobile', $mobile)
                ->first();
            if (!empty($clientEmail)) {

                //   $data2 = array();
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
                $number = $mobile;

                $n = intval(ltrim($number, '0')); // integer
                $pfx = '966';
                $number = $pfx . $n;

                try {
                    \Log::debug("Sending SMS to mobile: ", [
                        'mobile' => $number,
                        'message' => $msg
                    ]);

                    $response = $this->unifonicClient->sendMessage($number, $msg);

                    return response()->json(['status' => 'success', 'data' => $newPassword]);
                } catch (\Exception $exception) {
                    \Log::error('SMS error', ["message" => $exception->getMessage()]);

                    return response()->json(['status' => 'Error']);
                }
            }
        }

        public function forgetPassword2(Request $request)
        {
            if (!$request->has('email')) {
                return response()->json(['status' => 'Missing Email']);
            }

            $email = $request->input('email');

            $clientEmail = Dentist::where('email', $email)
                ->first();
            if (!empty($clientEmail)) {
                $data2 = new Dentist();
                $data2->email = $email;
                $newPassword = rand("100000", "999999");
                $message = "Dentist Pluss : your new Password " . $newPassword . "";
                $data2->message = $message;

                $data = ['password' => bcrypt($newPassword)];
                DB::table('users')
                    ->where('id', $clientEmail->id)
                    ->update($data);

                Mail::to($email)->send(new ForgetPassword($data2));

                if (count(Mail::failures()) > 0) {
                    $failuresArr = array();
                    foreach (Mail::failures() as $email_address) {
                        $failuresArr[] = $email_address;
                    }
                    return response()->json(['status' => 'Error', 'data' => $failuresArr]);
                } else {
                    return response()->json(['status' => 'success', 'data' => $newPassword]);
                }
            } else {
                return response()->json(['status' => 'Email Not found']);
            }
        }

        public function profileAction(Request $request)
        {
            $client = Dentist::find($request->dentist_id);


            $client->name = $request->name;
            $client->email = $request->email;
            $client->mobile = $request->mobile;

            if ($request->city_id) {
                $client->city_id = $request->city_id;
            }

            if ($client) {
                $client->update();

                return response()->json(['status' => 'Updated successefuly', 'data' => $client]);
            } else {
                return response()->json(['status' => 'Error']);
            }
        }


        public function hospitalUpdate(Request $request)
        {
            $client = Dentist::find($request->dentist_id);
            $hospital = DB::table('hospitals')
                ->where('id', $client->hospital)
                ->get();


            $client->hospital = $request->hospital;


            if ($client) {
                $client->update();

                return response()->json(['status' => 'Updated successefuly', 'data' => $client, 'hospital' => $hospital]);
            } else {
                return response()->json(['status' => 'Error']);
            }
        }


        public function hospitals(Request $request)
        {
            $hospital = Hospital::get();


            return response()->json(['status' => 'success', 'hospital' => $hospital]);
        }


        public function languageUpdate(Dentist $dentist)
        {
            $dentist->language = request()->lang;

            if ($dentist->update()) {
                return response()->json(['status' => 'Updated successefuly', 'data' => $dentist]);
            } else {
                return response()->json(['status' => 'Error']);
            }
        }
    }
