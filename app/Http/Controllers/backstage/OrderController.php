<?php

namespace App\Http\Controllers\backstage;

use DB;
use Auth;
use App\User;
use Calendar;
use App\Event;
use App\Dentist;
use App\Service;
use App\Follower;
use App\Hospital;
use App\Treatment;
use Carbon\Carbon;
use App\Dentist_calander;
use App\Nationality;
use App\City;
use App\User_notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //  $this->middleware('permission')->except('permission','store','update','search');

    }


    public function index()
    {

        $data = Event::orderBy('updated_at','desc')
        ->where('event_date', '>=' , Carbon::now()->subDays(180)) ->get();
           
        
       
        $this->data['objects'] = $data;

        foreach ($data as $d) {
            if (!empty($d->dentist_id)) {
                $dentist = Dentist::where('id', $d->dentist_id)->first();
                $this->data['dentist'][] = $dentist;
            } else {

                $this->data['dentist'][] = '';
            }

            $treatments = Service::where('id', $d->treatment_id)->first();
            $this->data['treatments'][] = $treatments;
            if ($d->follower_id != "") {
                $users = Follower::where('id', $d->follower_id)->first();
                $this->data['user'][] = $users;
            } else {
                $users = User::where('id', $d->user_id)->first();
                $this->data['user'][] = $users;
            }

        }

        return view('backstage.orders.index', $this->data);


    }
    
    public function deleteimg(request $request,$photo,$ids)
    {
        
        
        
      
       
        if ($ids) {
          
            DB::table('events')
                ->where('id', $ids)
                ->update([$photo => NULL]);
           
           
       
            
        $request->session()->flash("message", "تم ازالة الصور بنجاح");

       return redirect('/home/orders/edit/'. $ids);

        }
    }
    
    public function searchorder(request $request)
    {

        
        
        $data = Event::orderBy('event_date','desc')
        ->where('event_date', '>=' , $request->from)
        ->where('event_date', '<=' , $request->to) ->get();   
        
       
        $this->data['objects'] = $data;
        
      

        foreach ($data as $d) {
            if (!empty($d->dentist_id)) {
                $dentist = Dentist::where('id', $d->dentist_id)->first();
                $this->data['dentist'][] = $dentist;
            } else {

                $this->data['dentist'][] = '';
            }

            $treatments = Service::where('id', $d->treatment_id)->first();
            $this->data['treatments'][] = $treatments;
            if ($d->follower_id != "") {
                $users = Follower::where('id', $d->follower_id)->first();
                $this->data['user'][] = $users;
            } else {
                $users = User::where('id', $d->user_id)->first();
                $this->data['user'][] = $users;
            }

        }

        return view('backstage.orders.index', $this->data );


    }

    public function prev_Reserv()
    {

        $data = Event::where('event_date', '<', Carbon::now()->toDateString())->paginate(20);
        $this->data['objects'] = $data;
        foreach ($data as $d) {
            $dentist = Dentist::where('id', $d->dentist_id)->first();
            $this->data['dentist'][] = $dentist;
            $treatments = Service::where('id', $d->treatment_id)->first();
            $this->data['treatments'][] = $treatments;
            if ($d->follower_id != "") {
                $users = Follower::where('id', $d->follower_id)->first();
                $this->data['user'][] = $users;
            } else {
                $users = User::where('id', $d->user_id)->first();
                $this->data['user'][] = $users;
            }

        }

        return view('backstage.orders.prevCalender', $this->data);
    }

    //upcoming accepted reservation for dentist
    public function Upcoming_Reserv_acceptedD()
    {

        $date = date("Y-m-d");
        $data = Event::where('event_date', '>', $date)
            ->paginate(20);
        //var_dump($data);
        $this->data['objects'] = $data;
        foreach ($data as $d) {

            $treatments = Service::where('id', $d->treatment_id)->first();
            $this->data['treatments'][] = $treatments;
            if ($d->follower_id != "") {
                $users = Follower::where('id', $d->follower_id)->first();
                $this->data['user'][] = $users;
            } else {
                $users = User::where('id', $d->user_id)->first();
                $this->data['user'][] = $users;
            }

        }

        return view('backstage.orders.nextCalender', $this->data);
    }


    public function reservationForm()
    {

        $this->data['hospitals'] = Hospital::all();
        $this->data['followers'] = Follower::all();
        $this->data['treatments'] = Treatment::all();
        $this->data['dentists'] = Dentist::all();

        return view('event.reservationForm', $this->data);
    }

    public function reservationFormGet()
    {

        /*if($_GET['user']==0){
                $user_id = Auth::guard('client')->user()->id;
            }else{
                $user_id = Auth::guard('client')->user()->id;
                //$follower_id = $request->follower_id;

            }*/

        $date = $_GET['date'];
        $date = date('Y-m-d', strtotime($date));
        $this->data['date'] = $date;
        $service_id = $_GET['service_id'];
        $hospital_id = $_GET['hospital_id'];
        $this->data['hospital_id'] = $hospital_id;
        $this->data['service_id'] = $service_id;
        // $user->created_by ='0';
        $dates = DB::table('dentist_calanders')
            ->where('start_date', '<', $date)
            ->where('end_date', '>', $date)
            ->where('hospital_id', '=', $hospital_id)
            ->where('service_id', '=', $service_id)
            ->get();
        //$this->data['times']=$dates;
        $nameOfDay = date('l', strtotime($date));
//echo $nameOfDay;
        $this->data['times'] = "";


        foreach ($dates as $date) {
            /*$this->data['times']= DB::table('dentist_calanders')
             ->select("dentist_calanders.*")
             /*->select(DB::raw('*, max(id) as id'))*/
            /*->where('day','=',$nameOfDay)
           ->groupBy('start_time')
           
            ->get();*/
            $this->data['times'] = Dentist_calander::orderBy('id', 'desc')
                ->select('dentist_calanders.*', DB::raw('group_concat(dentist_id) as dentist_id'))
                ->where('day', '=', $nameOfDay)
                ->where('hospital_id', '=', $hospital_id)
                ->where('service_id', '=', $service_id)
                ->groupBy('start_time')
                ->get();
        }
        if ($this->data['times'] == "") {

            $this->data['error'] = "please check another date";
            return redirect('/reservation');
        }
        //$this->data['start']=$_GET['start'];
        //var_dump($xx);
        else {
            $this->data['error'] = "";
        }
        return view('event.reservationFormRest', $this->data);
    }

    public function search($start, $end, $hospital, $service, $date, $dentist)

    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $user_name = Auth::guard('client')->user()->name;

        $service_name = DB::table('services')
            ->where('id', $service)
            ->get();
        $hospital_name = DB::table('hospitals')
            ->where('id', $hospital)
            ->get();
        //$service_name=$service_name['service_name_ar'];
        //echo $segment = Request::segment(1);
//echo $request->route('start');
        return view('event.reservationFormFinish', ['start' => $start, 'end' => $end, 'hospital' => $hospital, 'service' => $service, 'date' => $date, 'dentist' => $dentist, 'service_name' => $service_name, 'hospital_name' => $hospital_name, 'user_name' => $user_name]);

    }


    public function store(request $request)
    {

        $event = new Event;
        /*if($request->user_id==0){
            $event->user_id = Auth::guard('client')->user()->id;
        }else{
            $event->user_id = Auth::guard('client')->user()->id;
            $event->follower_id = $request->follower_id;
            $event->relation = 1;
        }*/
        $event->user_id = Auth::guard('client')->user()->id;
        $event->start_time = $request->start;
        $event->end_time = $request->end;
        $event->event_date = $request->date;


        $event->treatment_id = $request->service;
        $event->hospital_id = $request->hospital;
        $event->dentist_id = $request->dentist;

        $event->diseases = $request->diseases;

        $event->drugs = $request->drugs;
        $event->description = $request->description;
        if ($request->photo) {
            $name = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/images'), $name);
            $event->photo = $name;
        }


        // $user->created_by ='0';
        $event->save();
        $request->session()->flash("message", "تم اضافة العضو بنجاح");

        return redirect('/UReservation');
    }


    public function accepet(request $request, $id)
    {


        if ($id) {
            $dentist_id = Auth::guard('dentist')->user()->id;
            DB::table('events')
                ->where('id', $id)
                ->update(['status' => 1, 'dentist_id' => $dentist_id]);

            $request->session()->flash("message", "تم اضافة العضو بنجاح");

        }

        //    


        // $user->created_by ='0';

        return redirect('/dUAReservation');
    }

    public function neglect(request $request, $id)
    {


        if ($id) {

            DB::table('events')
                ->where('id', $id)
                ->update(['status' => 2]);

            $request->session()->flash("message", "تم اضافة العضو بنجاح");

        }

        //    


        // $user->created_by ='0';

        return redirect('/dUAReservation');
    }

    public function approveArrival(request $request, $id)
    {

        //status 3 confrim arrival
        if ($id) {
            DB::table('events')
                ->where('id', $id)
                ->update(['status' => 3]);

            $request->session()->flash("message", "تم اضافة العضو بنجاح");

        }

        //    


        // $user->created_by ='0';

        return redirect('/dUAReservation');
    }

    public function details($id)
    {

        //status 3 confrim arrival
        if ($id) {
            $this->data['object'] = DB::table('events')
                ->select("events.*", "events.id As event_id", "events.photo As event_photo", "dentists.*", "dentists.name As D_name", "hospitals.*", "services.*", "users.name As Uname")
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                ->join('users', 'events.user_id', '=', 'users.id')
                ->where('events.id', $id)
                ->get();
            $doctors = explode(',',$this->data['object'][0]->dentist_id);
            $b_doctors = explode(',',$this->data['object'][0]->dentist_b_id);

            $docName = [];
            foreach ($doctors as $doctor){
                if($doctor != null){
                     $docName[]= Dentist::find($doctor)->name;
                 }
            }
            $this->data['name'] = $docName ;
            $b_docName = [];
            foreach ($b_doctors as $doctor){
                if($doctor != null){
                     $b_docName[]= Dentist::find($doctor)->name;
                 }
            }
            $this->data['b_name'] = $b_docName ;
            $follower = "";
            if ($this->data['object'][0]->follower_id != "") {
                $follower = DB::table('followers')
                    ->where('followers.id', $this->data['object'][0]->follower_id)
                    ->get();
            }
            $this->data['follower'] = $follower;
            return view('backstage.orders.details', $this->data);
        }


    }
    
    public function editorder($id)
    {
        $dentists = Dentist::all();
        $hospital = Hospital::all();
        $users = User::all();
        $hospitals = array ();
        $citie = array(); 
        foreach ($hospital as $hosp)
        {
            $hospitals[$hosp->id] = $hosp->hospital_name_ar;
            $citie [$hosp->id] = $hosp->city_id ; 
        }
      //  print_r($hospitals);
        
        $dentist = array ();
       // echo '<pre>';
              
           // print_r($dentist); exit;

        
      //$dentist = Hospitals::all();
      
        /*
        $sql = "SELECT dentists.id, dentists.name, dentists.hospital, hospitals.hospital_name_ar FROM `hospitals`, dentists WHERE dentists.hospital = hospitals.id AND hospitals.city_id = '{$event_details[$evnt_id]['city_id']}'"
        
        */
        $cities = City::all();
        $service = Service::all();
        if ($id) {
            $tasks = Event::find($id);
           // print_r($tasks); exit;
            foreach ($dentists as $did => $dent)
            {
                if (($citie[$dent->hospital] == $citie[$tasks->hospital_id]) && $dent->active ==1)
                {
                     $dentist []= array('id' => $dent->id,
                                    'name'=> $dent->name ,
                                     'hospital' => $hospitals[$dent->hospital]
                                    );
                }
            }

            //echo	$dentist_id = Auth::guard('dentist')->user()->name;
            //   return view('vendor.register')->with(['nationalitys'=>$nationalitys,'hospitals'=>$hospitals ]);
            // return view('backstage.Dentists.edit',compact('aDentist'));
            return view('backstage.orders.edit')->with(['tasks' => $tasks,'cities'=>$cities, 'dentists' => $dentist, 'users' => $users, 'service' => $service]);
        }
       
    }
    
    
    
     public function updateorder(request $request, $id)
    {

        $Orders = Event::find($id);
        $dentist = Dentist::find($request->dentist);

    //    echo $dentist->hospital ; exit;
       if ( $Orders->status !=5 && $Orders->status !=3)
       {
            $Orders->dentist_id = $request->dentist;    // update a new doctor 
            $Orders->hospital_id = $dentist->hospital;
            // update the hopsital id of a new doctor
            $Orders->event_date = $request->dates;
            $Orders->start_time = $request->event_time;
            $Orders->status = $request->status;
            $Orders->treatment_id = $request->service;
            $Orders->note = $request->note;
            $Orders->treatment = $request->treatment;
            $Orders->drugs = $request->drug;
            $Orders->diseases = $request->diseases;
            $Orders->description = $request->description;
       }
       else
       {
            $Orders->note = $request->note;
            $Orders->treatment = $request->treatment;
         
       }
            
       
        if ($request->photo) {
            $name = time() . '.' . $request->photo->getClientOriginalName();
            $request->photo->move(public_path('/images'), $name);
            $Orders->photo = $name;
        }
         
          if ($request->photo2) {
            $name = time() . '.' . $request->photo2->getClientOriginalName();
            $request->photo2->move(public_path('/images'), $name);
            $Orders->photo2 = $name;
        }
         
          if ($request->photo3) {
            $name = time() . '.' . $request->photo3->getClientOriginalName();
            $request->photo3->move(public_path('/images'), $name);
            $Orders->photo3 = $name;
        }
         
          if ($request->photo4) {
            $name = time() . '.' . $request->photo4->getClientOriginalName();
            $request->photo4->move(public_path('/images'), $name);
            $Orders->photo4 = $name;
        }
         
          if ($request->photo5) {
            $name = time() . '.' . $request->photo5->getClientOriginalName();
            $request->photo5->move(public_path('/images'), $name);
            $Orders->photo5 = $name;
        }
        
        if($Orders->status=='0' )
        {
            
      
         $dentist = Dentist::where('id', $request->dentist)
                ->first();
                $notification = new User_notification;
                $notification->dentist_id = $request->dentist;
                $notification->service_id = $request->service;
                $notification->event_id = $id;
                $notification->title = 'طبيب اسنان مجاني';
                $notification->mesg = 'لديك حجز موعد بانتظار اعتمادك';
                $notification->save();

                $token = $dentist->device_id;

                if ($dentist->language == 'ar') {
                    $body = 'لديك حجز موعد بانتظار اعتمادك #.' . $id . ' بتاريخ ' . $request->dates . ' لخدمة ' . $Orders->start_time . ' الساعة ' .  date('H:i A', strtotime($Orders->start_time));
                } else {
                    $body = 'You have an appointment waiting for your approval #.' . $id . ' with date ' . $request->dates . ' for the service ' . $Orders->start_time . ' at ' . date('H:i A', strtotime($Orders->start_time));
                }

                $notification = [
                'body' => $body, 'sound' => 'default',
            ];
                $extraNotificationData = ["message" => $notification, "event_id" => $id];

                $fcmNotification = [
                'to' => $token,
                'notification' => $notification,
                'data' => $extraNotificationData
            ];

                $headers = [
                'Authorization: key=' . env('FCM_API_ACCESS_KEY'),
                'Content-Type: application/json'
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
              }

            $request->session()->flash("message", "تم اضافة الحجز بنجاح بانتظار اعتماد الطبيب");
        
        $Orders->update();
        $request->session()->flash("message", "Orders edit successfully");

        return redirect('/home/orders/edit/'. $id);

    }
    
}