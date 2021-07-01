<?php

use App\User_notification;

namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Calendar;
    use App\Event;
    use App\User;
    use App\Dentist;
    use App\Dentist_calander;
    use App\Follower;
    use App\Treatment;
    use App\Service;
    use App\Hospital;
    use App\User_notification;
    use Auth;
    use DB;
    use Lexx\ChatMessenger\Models\Message;
    use Lexx\ChatMessenger\Models\Participant;
    use Lexx\ChatMessenger\Models\Thread;
    use Carbon\Carbon;
    use App\Url;
    use Validator;
    use DateTime;

    class ApiEventController extends Controller
    {
        public function Upcoming_Reserv(request $request)
        {
            $date = date("Y-m-d");

            $day_data = DB::table('events')
                        ->select("events.*", "events.created_at as created","events.id As events_id", "followers.*", "followers.name As follower_name",
                             "services.*", "services.service_name_ar As service_name",
                             "hospitals.*", "hospitals.hospital_name_ar As hospital_name",
                             "users.name As user_name", "dentists.*", "dentists.name As Dentist_name", "hospitals.*", "services.*")
                        ->join('services', 'events.treatment_id', '=', 'services.id')
                        ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
                        ->leftJoin('dentists', function ($query) {
                            $query->whereRaw("find_in_set(events.dentist_id,dentists.id)");
                        })
                        ->join('users', 'events.user_id', '=', 'users.id')
                        ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                        ->where('events.user_id', $request->user_id)
                        ->orderBy('events.id', 'desc')
                        //*->orderBy(DB::raw('(CASE WHEN DATE(event_date) > DATE(CURDATE()) THEN 1 ELSE 0 END)'),'desc')->orderBy('event_date', 'asc')
                        ->limit(30)->get();
                        
                        
                        foreach($day_data as $key => $value)
                        {
                            $dateTime = strtotime($value->event_date."  ".$value->start_time);
                            $value->event_date=date('l d m Y  h:m a ', $dateTime);
                        }
                        
                        

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $day_data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }

        public function prev_Reserv(request $request)
        {
            $date = date("Y-m-d");

            $day_data = DB::table('events')
            ->select("events.*", "events.id As events_id", "followers.*", "followers.name As follower_name", "users.name As user_name", "dentists.*", "dentists.name As Dentist_name", "hospitals.*", "services.*")
            ->join('services', 'events.treatment_id', '=', 'services.id')
            ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
            ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
            ->join('users', 'events.user_id', '=', 'users.id')
            ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
            ->where('events.user_id', $request->user_id)
            ->where(function ($query) use ($date) {
                $query->where('event_date', '<', $date)
                    ->orwhere('status', 5)
                    ->orwhere('status', 3)
                    ->orwhere('status', 4);
            })->orderBy('events.event_date', 'desc')
            ->limit(30)->get();

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $day_data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }
        
         public function gethospitals(request $request)
        {
            
            
            $hospitals = DB::table('dentist_calanders')
            ->select("dentist_calanders.*","hospitals.*","cities.*")
            ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
            
            
            
            ->join('cities', 'hospitals.city_id', '=', 'cities.id')
          
           
             ->where('hospitals.city_id', $request->city)
              ->where('dentist_calanders.end_date', "<" , "2021-04-29")
             ->where('dentist_calanders.service_id', $request->service)
           
             
             ->groupby('hospital_name_ar')->get();
 
              
              
            /*$hospitals = DB::table('dentist_calanders')
            ->select("dentist_calanders.id","hospitals.hospital_name_ar", 'hospitals.id as "hospital_id')
            ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
            ->join('cities', 'hospitals.city_id', '=', 'cities.id')
             ->where('hospitals.city_id', $request->city)
             ->where('dentist_calanders.service_id', $request->service)
                          ->groupby('hospital_name_ar')->get();*/

             
           /* $sql = 'SELECT DISTINCT(dentist_calanders.hospital_id), hospitals.*  FROM dentist_calanders , hospitals 
                    WHERE dentist_calanders.hospital_id = hospitals.id 
                    AND hospitals.city_id = :city_id
                    AND dentist_calanders.service_id = :service_id 
                    ';
             $hospitals = DB::select($sql, ['city_id' => $request->city , 'service_id'=>  $request->service ]);*/

           
             
 
            if (sizeof($hospitals) != 0) {
                return response()->json(['data' => $hospitals, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }

        //upcoming accepted reservation for dentist
        public function Upcoming_Reserv_acceptedD(request $request)
        {
            $date = date("Y-m-d");

            $day_data = DB::table('events')
                        ->select("events.*", "events.id As events_id", "followers.*", "followers.name As follower_name", "users.name As user_name", "hospitals.*", "services.*")
                        ->join('services', 'events.treatment_id', '=', 'services.id')
                        ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
                        ->join('users', 'events.user_id', '=', 'users.id')
                        ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                        ->where(function ($query) use ($date) {
                            $query->where('event_date', '>', $date)
                                ->orwhere('event_date', '=', $date);
                        })
                        ->where('status', 1)
                        ->where('dentist_id', $request->dentist_id)
                        ->orderBy('event_date', 'desc')
                        ->limit(30)->get();

            $this->data['Next_Dates_Approved'][] = $day_data;

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $this->data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }

        public function Upcoming_Reserv_D(request $request)
        {
            $c_dentist = $request->dentist_id;
            $date = date("Y-m-d");


            $day_data = DB::table('events')
                        ->select("dentists.mobile","events.*", "events.id As events_id", "followers.*", "followers.name As follower_name", "users.name As user_name", "hospitals.*", "services.*")
                        ->join('services', 'events.treatment_id', '=', 'services.id')
                         ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                        ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
                        ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                        ->join('users', 'events.user_id', '=', 'users.id')
                        ->where('event_date','>=',$date)
                        ->where('dentist_id','=',$c_dentist)
               
                        
                        ->orderBy('events.id', 'desc')->limit(30)
                        ->get();

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $day_data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }

        public function prev_ReservD(request $request)
        {
            $date = date("Y-m-d");
            $c_dentist = $request->dentist_id;

            $day_data = DB::table('events')
                        ->select("events.*", "events.id As events_id", "followers.*", "followers.name As follower_name", "users.name As user_name", "hospitals.*", "services.*")
                        ->join('services', 'events.treatment_id', '=', 'services.id')
                        ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
                        ->join('users', 'events.user_id', '=', 'users.id')
                        ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                        ->where("dentist_id", $c_dentist)
                        ->where('event_date', '<', $date)
                        ->orderBy('events.event_date', 'desc')
                        ->limit(30)->get();

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $day_data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'Not found']);
            }
        }

        //pending upcoming reservation
        public function pending_ReservD(request $request)
        {
            $day_data = DB::table('events')
                            ->select("events.*", "events.id As events_id", "followers.*", "followers.name As u_name", "hospitals.*", "services.*")
                            ->join('services', 'events.treatment_id', '=', 'services.id')
                            ->leftJoin('followers', 'events.follower_id', '=', 'followers.id')
                            ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                            ->where('event_date', '>', Carbon::now()->toDateString())
                            ->where('dentist_id', $request->dentist_id)
                            ->orderBy('event_date', 'desc')->limit(30)->get();

            $this->data['pending_Dates'][] = $day_data;

            if (sizeof($day_data) != 0) {
                return response()->json(['data' => $this->data, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'No pending Reservation']);
            }
        }

        public function reservationFormGet(request $request)
        {
            $this->validate(
                $request,
                [
                'service_id' => 'required',

                'hospital_id' => 'required',

            ]
            );
            
            $date = $request->input('date');
            $date = date('Y-m-d', strtotime($date));
            $this->data['date'] = $date;
            $service_id = $request->input('service_id');
            $hospital_id = $request->input('hospital_id');
            $this->data['hospital_id'] = $hospital_id;
            $this->data['service_id'] = $service_id;

            $this->data['times'] = DB::table('dentist_calanders')
                ->select('dentist_calanders.*', DB::raw('group_concat(DISTINCT dentist_calanders.dentist_id) as dentist_id'))
                /*->leftJoin('events', 'dentist_calanders.id', '=', 'events.calander_id')
                 ->where('events.user_id', '!=', $request->input('user_id'))
                 ->orwhere('events.user_id', '=', null)*/
                ->where('start_date', '<', $date)
                ->where('end_date', '>', $date)
                ->where('dentist_calanders.hospital_id', '=', $hospital_id)
                ->where('service_id', '=', $service_id)
                ->where('dentist_calanders.status', '=', 0)
                //->where('dentist_calanders.start_time','>=',Carbon::now()->format('H:i:s'))
                ->groupBy('start_time')
                ->get();


            if ($this->data['times'] == "") {
                return response()->json(['status' => 'please check another date']);
            }
          //  $this->data['times'] ='test';
            return response()->json(['data' => $this->data, 'status' => 'success']);
        }

        public function search($start, $end, $hospital, $service, $date, $dentist)
        {
            $user_name = Auth::guard('api')->user()->name;

            $service_name = DB::table('services')
                ->where('id', $service)
                ->get();
            $hospital_name = DB::table('hospitals')
                ->where('id', $hospital)
                ->get();
            //$service_name=$service_name['service_name_ar'];
            //echo $segment = Request::segment(1);
            //echo $request->route('start');
            //return response()->json(['data'=>$this->data,'success']);
            $check_user2 = DB::table('events')
                ->where('event_date', $date)
                ->where('start_time', $start)
                ->where('hospital_id', $hospital)
                ->where('treatment_id', $service)
                ->where(function ($query) {
                    $query->where('status', 1)
                        ->orwhere('status', 2)
                        ->orwhere('status', 5);
                })
                ->get();
            //  var_dump($check_user);
            //  exit();
            if (count($check_user2)) {
                return response()->json(['status' => 'Not Valid']);
            }

            return response()->json(['status' => 'success', 'start' => $start, 'end' => $end, 'hospital' => $hospital, 'service' => $service, 'date' => $date, 'dentist' => $dentist, 'service_name' => $service_name, 'hospital_name' => $hospital_name, 'user_name' => $user_name]);
        }

        public function store(request $request)
        {
            
           
            
            $request->date=date("Y-m-d", strtotime($request->date));
        
            
            $exists = Event::where('user_id', $request->user_id)
            ->join('dentists','dentists.id','=','dentist_id')
             ->where('dentists.active', '1')
            ->where('treatment_id', $request->service)->whereNotIn('status', [3,4])
            ->where('event_date', $request->date)
            ->where('start_time', $request->time)
            ->where('hospital_id', $request->hospital)->first();
             

            if ($exists) {
                return response()->json(['status' => 0, 'message' =>  'تم حجز هذا الموعد من قبل']);
            } else {
                $events = new Event;

                if ($request->user == 0) {
                    $events->user_id = $request->user_id;
                } else {
                    $events->user_id = $request->user_id;
                    $events->follower_id = $request->follower_id;
                    $events->relation = 1;
                }

                $events->start_time = $request->time;
                $events->calander_id =  $request->calander_id;
                $events->event_date = $request->date;
                $events->device_id = $request->device_id;


                $events->treatment_id = $request->service;
                $events->hospital_id = $request->hospital;
                $events->dentist_id = $request->dentist;
                $events->dentist_b_id = $request->dentist;
                $events->diseases = $request->diseases;

                $events->drugs = $request->drugs;
                $events->description = $request->description;

                if ($request->photo) {
                    $name = date('His').$request->photo->getClientOriginalName();
                    $request->photo->move(public_path('/images'), $name);
                    $events->photo = $name;
                }

                if ($request->photo2) {
                    $name2 = date('His').$request->photo2->getClientOriginalName();
                    $request->photo2->move(public_path('/images'), $name2);
                    $events->photo2 = $name2;
                }

                if ($request->photo3) {
                    $name3 = date('His').$request->photo3->getClientOriginalName();
                    $request->photo3->move(public_path('/images'), $name3);
                    $events->photo3 = $name3;
                }

                if ($request->photo4) {
                    $name4 = date('His').$request->photo4->getClientOriginalName();
                    $request->photo4->move(public_path('/images'), $name4);
                    $events->photo4 = $name4;
                }

                if ($request->photo5) {
                    $name5 = date('His').$request->photo5->getClientOriginalName();
                    $request->photo5->move(public_path('/images'), $name5);
                    $events->photo5 = $name5;
                }


                $events->save();
                $event_id = $events->id;
            }

            $event = DB::table('events')
                    ->select("events.*", "events.id As event_id", "services.*")
                    ->join('services', 'events.treatment_id', '=', 'services.id')
                    ->where('events.id', $event_id)
                    ->get();

            $dentists = explode(',', $request->dentist);

            if (count($dentists) > 1 && $request->dentist != null) {
                $tokenList =[];

                foreach ($dentists as $i) {
                    $dentist = Dentist::where('id', $i)
                    ->first();

                    $notification = new User_notification;
                    $notification->dentist_id = $i;
                    $notification->service_id = $event[0]->treatment_id;
                    $notification->event_id = $event_id;
                    $notification->title = 'طبيب اسنان مجاني';
                    $notification->mesg = 'لديك حجز موعد بانتظار اعتمادك';
                    $notification->save();

                    if (null !== $dentist->device_id) {
                        $tokenList[] =$dentist->device_id;
                    }
                }

                if ($dentist->language == 'ar') {
                    $body = 'لديك حجز موعد بانتظار اعتمادك #.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                } else {
                    $body = 'You have an appointment waiting for your approval #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
                }
                
                $events->sendmessage($body,$tokenList);


             

               
               return response()->json(['status' => 1, 'message' =>  'success']);
                
            } else {
                $dentist = Dentist::where('id', $request->input('dentist'))
                    ->first();
                $notification = new User_notification;
                $notification->dentist_id =  $request->input('dentist');
                $notification->service_id = $event[0]->treatment_id;
                $notification->event_id = $event_id;
                $notification->title = 'طبيب اسنان مجاني';
                $notification->mesg = 'لديك حجز موعد بانتظار اعتمادك';
                $notification->save();

                $token = $dentist->device_id;

                if ($dentist->language == 'ar') {
                    $body = 'لديك حجز موعد بانتظار اعتمادك #.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                } else {
                    $body = 'You have an appointment waiting for your approval #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
                }
                
                 $events->sendmessage($body,$token);
                
 
                return response()->json(['status' => 1, 'message' =>  'success', 'body'=>$body]);
            }
        }

        public function accepet(request $request)
        {
            $dentist_id = $request->dentist_id;
            $event_id = $request->event_id;
            $searchString = ',';

            $event = DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")
            ->join('services', 'events.treatment_id', '=', 'services.id')
            ->where('events.id', $event_id)
            ->get();

            if ($event[0]->status == 3 || $event[0]->status == 4) {
                return response()->json(['status' => 'Error','message' => 'event canceled']);
            }


            $docs = $event[0]->dentist_id;

            $update = DB::table('events')
                ->where('id', $event_id)
                ->where('status', 0)
                ->update(['status' => 1, 'dentist_approved' => 1, 'dentist_id' => $dentist_id]);

            if ($update) {
                if (count($event) > 0) {
                    DB::table('dentist_calanders')
                        ->where('hospital_id', $event[0]->hospital_id)
                        ->where('service_id', $event[0]->treatment_id)
                        ->where('start_date', $event[0]->event_date)
                        ->where('start_time', $event[0]->start_time)
                        ->where('dentist_id', $dentist_id)
                        ->update(['status' => 1, 'flag' => 1]);

                    $event_statuss = DB::table('events')
                        ->where('hospital_id', $event[0]->hospital_id)
                        ->where('treatment_id', $event[0]->treatment_id)
                        ->where('event_date', $event[0]->event_date)
                        ->where('start_time', $event[0]->start_time)
                        ->where('status', 0)
                        ->get();


                    if ($event_statuss) {
                        foreach ($event_statuss as $event_status) {
                            $search = $event_status->dentist_id;

                            if (strpos($search, $searchString) !== false) {
                                $array = str_replace($dentist_id, "", $search);
                                $array = str_replace(',,', ',', $array);
                                $array = trim($array, ',');

                                DB::table('events')
                                    ->where('id', $event_status->id)
                                    ->update(['status' => 0, 'dentist_id' => $array]);
                            } elseif ($event_status->dentist_id == $dentist_id) {
                                Event::find($event_status->id)->delete();
                            } else {
                                DB::table('events')
                                ->where('id', $event_status->id)
                                ->update(['status' => 3,'user_notify' => 0]);


                                $notification = new User_notification;
                                $notification->user_id = $event_status->user_id;
                                $notification->service_id = $event_status->treatment_id;
                                $notification->event_id = $event_status->id;
                                $notification->title = 'طبيب اسنان مجاني';
                                $notification->mesg = 'يعتذر الطبيب ﻹلغاء الموعد';
                                $notification->save();

                                $token = $event_status->device_id;
                                $user_lang = User::find($event_status->user_id)->language;

                                if ($user_lang == 'ar') {
                                    $body = 'نعتذر لعدم إعتماد موعدك #.' . $event_status->id . ' بتاريخ ' . $event_status->event_date . ' لخدمة ' . $event_status->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event_status->start_time)) .' بإمكانك حجز موعد اخر ';
                                } else {
                                    $body = 'We apologize for not approving your appointment #.' . $event_status->id . ' with date ' . $event_status->event_date . ' for the service ' . $event_status->service_name_en . ' at ' . date('H:i A', strtotime($event_status->start_time)) .' You can book another appointment';
                                }

                                if ($token) {
                                   $events = new Event;            
                              $events->sendmessage($body,$token);
                                }
                            }
                        }
                    }

                    $dentist = Dentist::find($dentist_id);

                    $query='SELECT x.* FROM lexx_participants x left join lexx_participants y on x.thread_id=y.thread_id where x.user_id='.$event[0]->user_id.' and x.type=2 and y.user_id='.$dentist_id.' and y.type=1';
                    $res=DB::select($query);

                    if (!isset($res[0])) {
                        $thread = Thread::create(['subject' => ' محادثة  دكتور ' . $dentist->name, 'start_date' => Carbon::now()->format('Y-m-d'), 'end_date' => $event[0]->event_date]);
                        // Message
                        $message = DB::table('lexx_messages')->insert(['thread_id' => $thread->id,
                        'user_id' => $dentist_id,
                        'type' => 1,
                        'body' => 'مرحبا يمكنك بدأ المحادثة','created_at' => Carbon::now()]);
                        // Sender
                        DB::table('lexx_participants')->insert(['thread_id' => $thread->id, 'user_id' => $event[0]->user_id,
                        'type' => 2, 'last_read' => Carbon::now()->format('Y-m-d'),'created_at' => Carbon::now()]);
                        DB::table('lexx_participants')->insert(['thread_id' => $thread->id, 'user_id' => $dentist_id,
                        'type' => 1, 'last_read' => Carbon::now()->format('Y-m-d'),'created_at' => Carbon::now()]);
                    }
                    /*api_key available in:
                    Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/


                    $token = $event[0]->device_id;

                    $user_lang = User::find($event[0]->user_id)->language;

                    if ($user_lang == 'ar') {
                        $body = 'لقد تم اعتماد موعدك #.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' .  date('H:i A', strtotime($event[0]->start_time));
                    } else {
                        $body = 'Your appointment has been approved #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' .  date('H:i A', strtotime($event[0]->start_time));
                    }

                    $events = new Event;            
                              $events->sendmessage($body,$token);

                    $notification = new User_notification;
                    $notification->user_id = $event[0]->user_id;
                    $notification->service_id = $event[0]->treatment_id;
                    $notification->event_id = $event_id;
                    $notification->title = 'طبيب اسنان مجاني';
                    $notification->mesg = 'لقد تم اعتماد موعدك';
                    $notification->save();



                    if (strpos($docs, $searchString) !== false) {
                        $array = str_replace($dentist_id, "", $docs);
                        $array = str_replace(',,', ',', $array);
                        $array = explode(',', trim($array, ','));


                        foreach ($array as $doc_id) {
                            $dentist = Dentist::find($doc_id);

                            $token = $dentist->device_id;

                            $user_lang = $dentist->language;

                            if ($user_lang == 'ar') {
                                $body = 'لقد قام طبيب آخر باعتماد الموعد #.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' .  date('H:i A', strtotime($event[0]->start_time));
                            } else {
                                $body = 'Another doctor approved the appointment #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' .  date('H:i A', strtotime($event[0]->start_time));
                            }

                            $events = new Event;            
                              $events->sendmessage($body,$token);

                            $notification = new User_notification;
                            $notification->dentist_id = $doc_id;
                            $notification->service_id = $event[0]->treatment_id;
                            $notification->event_id = $event_id;
                            $notification->title = 'طبيب اسنان مجاني';
                            $notification->mesg = 'تم اعتماد الموعد من طبيب اخر';
                            $notification->save();
                        }

                        return $result;
                    }
                } else {
                    return response()->json(['status' => 'Error']);
                }
            }


            // $user->created_by ='0';
            //  return response()->json(['status'=>'success']);
        }
        
        
        public function userAccepet(request $request, $id)
        {
            //paitient accepet reserv

            //	$event_id = $request->event_id;
            // 
          
            // $date1 = new DateTime($events);
            // $date2 = new DateTime($now_date);
            // $interval = $date1->diff($date2);
               
               $now_date = Carbon::now()->addDays(1)->format('Y-m-d');  
               $events = DB::table('events')->where('id', $id)->first()->event_date;
               
            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "dentists.*", "services.*")
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();
                
                if($now_date!=$events)
                {
                    return response()->json(['status' => 0, 'message' =>"يرجي تأكيد الحضور قبل الموعد ب24 ساعة"]);
                }

            //  if( $interval->d == 0 && $interval->y == 0){
            DB::table('events')
                    ->where('id', $id)
                    ->update(['status' => 2,'dentist_notify'=> 0]);

            $token = $event[0]->device_id;

            $user_lang = User::find($event[0]->user_id)->language;
            
      

            
               $body = 'لقد تم تأكيد حضورك  لموعد#.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                  
      $events = new Event;            
      $events->sendmessage($body,$token);
        
      
    
  return response()->json(['status' => 1, 'message' =>$body]);
           
        
                  }

        

        public function neglect(request $request, $id)
        {
            if ($id) {
                $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "services.*")
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();

                if ($event[0]->status == 4 || $event[0]->status == 3) {
                    return response()->json(['status' => 0, 'message' =>  'date_canceld']);
                }

                $dentist_id = $request->dentist_id;

                Dentist_calander::where('dentist_id', $dentist_id)->where('service_id', $event[0]->treatment_id)->first()->update([
                    'status'=>0,
                    'flag'=>0
                ]);

                $search = $event[0]->dentist_id;
                $searchString = ',';

                if (strpos($search, $searchString) !== false) {
                    $array = str_replace($dentist_id, "", $search);
                    $array = str_replace(',,', ',', $array);

                    $array = trim($array, ',');

                    DB::table('events')
                        ->where('id', $id)
                        ->update(['status' => 0, 'neglect' => 1, 'dentist_id' => $array]);
                } else {
                    Event::find($id)->update(['status' => 3,'user_notify' => 0]);

                    $token = $event[0]->device_id;
                    $user_lang = User::find($event[0]->user_id)->language;

                    if ($user_lang == 'ar') {
                        $body = 'نعتذر لإلغاء موعدك رقم #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time)) .' بإمكانك حجز موعد اخر ';
                    } else {
                        $body = 'We apologize for not approving your appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time)) .' You can book another appointment';
                    }

                    $events = new Event;            
      $events->sendmessage($body,$token);
      
                    $notification = new User_notification;
                    $notification->user_id = $event[0]->user_id;
                    $notification->service_id = $event[0]->treatment_id;
                    $notification->event_id = $id;
                    $notification->title = 'طبيب اسنان مجاني';
                    $notification->mesg = 'يعتذر الطبيب ﻹلغاء الموعد';
                    $notification->save();
                }


                return response()->json(['status' => 1, 'message' =>  'success']);
            }
        }


        /*
        Event Status:
        0=> pending
        1=> confirm from dentist
        2=> confirm  from patient
        3=> cancel from dentist
        4=> cancel from patient
        5=> approve arrival from dentist
        */
        public function userNeglect(request $request, $id)
        {
            //paitient negelect reserv
            if ($id) {
                $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "dentists.*", "services.*")
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();


                if ($event[0]->status == 4 || $event[0]->status == 3) {
                    return response()->json(['status' => 0, 'message' =>  'date_canceld']);
                }


                $dentists = explode(',', $event[0]->dentist_id);

                if ($event[0]->status != 0) {
                    DB::table('dentist_calanders')
                        ->where('hospital_id', $event[0]->hospital_id)
                        ->where('service_id', $event[0]->treatment_id)
                        ->where('start_date', $event[0]->event_date)
                        ->where('dentist_id', $event[0]->dentist_id)
                        ->update(['status' => 0]);
                }

                $tokenList =[];
                foreach ($dentists as $i) {
                    $dentist = Dentist::where('id', $i)
                    ->first();

                    $notification = new User_notification;
                    $notification->dentist_id = $i;
                    $notification->service_id = $event[0]->treatment_id;
                    $notification->event_id = $id;
                    $notification->title = 'طبيب اسنان مجاني';
                    $notification->mesg = 'يعتذر المراجع ﻹلغاء الموعد';
                    $notification->save();

                    $tokenList[] = $dentist->device_id;
                }
                 $token = $event[0]->device_id;

                if ($dentist->language == 'ar') {
                 $body = ' لقد قمت بألغاء الموعد #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                } else {
                    $body = ' The patient apologizes for canceling the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
                }

               $events = new Event;            
               $events->sendmessage($body,$token);




                DB::table('events')
                ->where('id', $id)
                ->update(['status' => 4]);

                return response()->json(['status' => 1, 'message' =>$body]);
            }
        }

        public function approveArrival(request $request, $id)
        {

            //status 3 confrim arrival
            if ($id) {
                $date = date('Y-m-d');
                DB::table('events')
                    ->where('id', $id)
                    ->where(function ($query) use ($date) {
                        $query->where('event_date', '<', $date)
                            ->orwhere('event_date', '=', $date);
                    })
                    ->update(['status' => 5, 'user_notify' => 0]);
            }

            $event_id = $id;
            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "services.*")
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $event_id)
                ->get();


            $token = $event[0]->device_id;
            $user_lang = User::find($event[0]->user_id)->language;

            if ($user_lang == 'ar') {
                $body = 'لقد تم تسجيل وصولك لموعد#.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' .  date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = 'Your arrival have been registered for the appointment #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' .  date('H:i A', strtotime($event[0]->start_time));
            }
                 
                $events = new Event;            
      $events->sendmessage($body,$token); 
           
            $notification = new User_notification;
            $notification->user_id = $event[0]->user_id;
            $notification->service_id = $event[0]->treatment_id;
            $notification->event_id = $event_id;
            $notification->title = 'طبيب اسنان مجاني';
            $notification->mesg = 'لقد تم تسجيل وصولك لموعد';
            $notification->save();
            echo $result;
        }

        public function details($id)
        {

            //status 3 confrim arrival
            if ($id) {
                $this->data['object'] = DB::table('events')
                    ->select(
                        "events.*",
                        "events.id As event_id",
                        "events.photo As event_photo",
                        "events.photo2 As event_photo2",
                        "events.photo3 As event_photo3",
                        "events.photo4 As event_photo4",
                        "events.photo5 As event_photo5",
                        "dentists.*",
                        "dentists.name As D_name",
                        "dentists.mobile As D_mobile",
                        "hospitals.*",
                        "services.*",
                        "users.name As Uname",
                        "users.birthdate as birthdate",
                        "users.mobile As U_mobile"
                    )
                    ->join('services', 'events.treatment_id', '=', 'services.id')
                    ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                    ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                    ->join('users', 'events.user_id', '=', 'users.id')
                    ->where('events.id', $id)
                    ->get();
                //dd($object);
                $follower = "";
                if (isset($this->data['object'][0]) && $this->data['object'][0]->follower_id != "") {
                    $follower = DB::table('followers')
                        ->where('followers.id', $this->data['object'][0]->follower_id)
                        ->get();
                        
                        
                 $age = '   (العمر: ' .  Carbon::parse($follower[0]->birthdate)->age . ')';
                  $follower[0]->name = $follower[0]->name .$age ;
                }
              //  @$this->data['object'][0]->'Uname' = 'Test';
                $this->data['follower'] = $follower;
                
                 if ($this->data['object'][0]->status != 1) {
                      $this->data['object'][0]->U_mobile = '';
                 }

                 $age = '   (العمر: ' .  Carbon::parse($this->data['object'][0]->birthdate)->age . ')';
                  $this->data['object'][0]->Uname =  $this->data['object'][0]->Uname .$age ;
                return response()->json(['data' => $this->data, 'status' => 'success']);
            }
        }

        public function showNotify()
        {
            return view('backstage.notify');
        }

        public function notifyUsers(Request $request)
        {
            
    
            $validator = Validator::make($request->all(), [
           'title'=>'require',
         'message'=>'required'
        ]);

            $headers = [
            'Authorization: key=' . env('FCM_API_ACCESS_KEY'),
            'Content-Type: application/json'
        ];
            $tokens = [];
             
            $notification = [
            'body' => $request->message,
            'title' => $request->title,
            'msg' => $request->message,
            'sound' => 'default',
        ];
       // echo $request->message . ' === ' .  $request->title . ' === '.  $request->message; exit;
        //dd($notification);
            $extraNotificationData = ["message" => $notification, 'title' => $request->title,'body' => $request->message,'msg' => $request->message];


            if ($request->notify == 0) {
                $users = User::where('device_id', '!=', null)->get();

                foreach ($users as $user) {
                    $tokens[] = $user->device_id;

                    $notification = new User_notification;
                    $notification->user_id = $user->id;
                    $notification->title = $request->title;
                    $notification->mesg = $request->message;
                    $notification->save();
                }
            } elseif ($request->notify == 1) {
                $dentists = Dentist::where('device_id', '!=', null)->get();
                foreach ($dentists as $dentist) {
                    $tokens[] = $dentist->device_id;

                    $notification = new User_notification;
                    $notification->dentist_id = $dentist->id;
                    $notification->title = $request->title;
                    $notification->mesg = $request->message;
                    $notification->save();
                }
            }

            $fcmNotification = [
        'registration_ids' => $tokens, //multple token array
//            'to' => $event->device_id, //single token
        'notification' => $notification,
        'data' => $extraNotificationData
     ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, env('FCM_URL'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            $result = curl_exec($ch);
            curl_close($ch);

            return redirect()->back();
        }
    }
