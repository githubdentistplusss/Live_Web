<?php
namespace App\Http\Controllers;

use App\Dentist;
use App\Dentist_calander;
use App\Event;
use App\Follower;
use App\Hospital;
use App\Nationality;
use App\Service;
use App\User;
use App\User_notification;
use Auth;
use Calendar;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Http\Request;
use Lexx\ChatMessenger\Models\Thread;
use Session;

class EventController extends Controller
{
    public function index()
    {
        $events = [];
        $data = Event::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date . ' +1 day'),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#f05050',
                        'url' => 'pass here url and any route',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events)
            ->setOptions([
                'firstDay' => 1,
                'editable' => true,
                'selectable' => true,

                'minTime' => '05:00:00',
                'maxTime' => '22:00:00',
            ])
            ->setCallbacks([
                'eventClick' => 'function(event) { alert(event.title)}',
                'select' => 'function(start, end, allDay) { alert("d")}',
            ]);

        return view('fullcalender', compact('calendar'));
    }

    public function Upcoming_Reserv()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $date = date("Y-m-d");
        $data = Event::where('user_id', Auth::guard('client')->user()->id)
            ->where(function ($query) use ($date) {
                $query->where('event_date', '>', $date)
                    ->orwhere('event_date', '=', $date);
            })
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orwhere('status', 0);
            })->orderBy('event_date', 'desc')->paginate(15);

        $this->data['events'] = $data;

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

        return view('views.client.upcoming-appointments', $this->data);
    }

    public function prev_Reserv()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $date = date("Y-m-d");
        $data = Event::where('user_id', Auth::guard('client')->user()->id)
            ->where(function ($query) use ($date) {
                $query->where('event_date', '<', $date);
               
            })->orderBy('event_date', 'desc')->paginate(15);
        $this->data['events'] = $data;
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

        // dd($this->data);

        return view('views.client.previous-appointments', $this->data);
    }

    public function Upcoming_AReserv()
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
        }
        $date = date("Y-m-d");
        $data = Event::where('user_id', Auth::guard('client')->user()->id)
            ->where(function ($query) use ($date) {
                $query->where('event_date', '>', $date)
                    ->orwhere('event_date', '=', $date);
            })
           
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        $this->data['events'] = $data;
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

        return view('views.client.upcoming-accepted-appointments', $this->data);
    }

    //upcoming accepted reservation for dentist
    public function Upcoming_Reserv_acceptedD()
    {
        if (!Auth::guard('dentist')->check()) {
            return redirect('dLogin');
        }
        $c_dentist = Auth::guard('dentist')->user()->id;
        $date = date("Y-m-d");
        $data = Event::whereRaw("find_in_set($c_dentist,dentist_id)")->where(function ($query) use ($date) {
            $query->where('event_date', '>', Carbon::now()->toDateString())
                ->orwhere('event_date', '=', Carbon::now()->toDateString());
      
        })->orderBy('events.id', 'desc')->paginate(15);
        //dd($data);
        $this->data['events'] = $data;
        foreach ($data as $d) {
            $treatments = Service::where('id', $d->treatment_id)->first();
            $this->data['treatments'][] = $treatments;
            if ($d->follower_id != "") {
                //    echo $d->follower_id;
                $users = Follower::where('id', $d->follower_id)->first();
                $this->data['user'][] = $users;
                //    dd($users);
            } else {
                $users = User::where('id', $d->user_id)->first();
                $this->data['user'][] = $users;
            }
        }

        return view('views.dentist.upcoming-accepted-appointments', $this->data);
    }

    public function Upcoming_Reserv_D()
    {
        if (!Auth::guard('dentist')->check()) {
            return redirect('dLogin');
        }
        $c_dentist = Auth::guard('dentist')->user()->id;
        $date = date("Y-m-d");
        $data = Event::where(function ($query) use ($date) {
            $query->where('event_date', '>', $date)
                ->orwhere('event_date', '=', $date);
        })
            ->where(function ($query) {
                $query->where('status', 0)
                ;
            })
            ->whereRaw("find_in_set($c_dentist,dentist_id)")
            ->orderBy('event_date', 'desc')->paginate(15);

        $this->data['events'] = $data;
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

        return view('views.dentist.upcoming-appointments', $this->data);
    }

    public function prev_ReservD()
    {
        if (!Auth::guard('dentist')->check()) {
            return redirect('dLogin');
        }
        $date = date("Y-m-d");

        $data = Event::where('dentist_id', Auth::guard('dentist')->user()->id)->where(function ($query) use ($date) {
            $query->where('event_date', '<', Carbon::now()->toDateString());
           
        })->where(function ($query) {
            $query->where('dentist_approved', 1);
            $query->orwhere('status', 4)
                ->orwhere('status', 3);
        })->orderBy('event_date', 'desc')->paginate(15);

        $this->data['events'] = $data;
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

        return view('views.dentist.previous-appointments', $this->data);
    }

    //pending upcoming reservation
    public function pending_ReservD()
    {
        if (!Auth::guard('dentist')->check()) {
            return redirect('dLogin');
        }

        $data = Event::where('event_date', '>', Carbon::now()->toDateString())->where('status', 0)
            ->where('dentist_id', Auth::guard('dentist')->user()->id)
            ->orderBy('event_date', 'desc')->get();
        $this->data['events'] = $data;
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

        return view('vendor.pendCalender', $this->data);
    }
         static function sortFunction( $a, $b ) {
    return strtotime($a[0]) - strtotime($b[0]);
}

    public function reservationForm()
    {
        $this->data['hospitals'] = Hospital::all();
        $this->data['followers'] = Follower::all();
        $this->data['treatments'] = Service::all();
        $this->data['dentists'] = Dentist::all();

        return view('event.reservationForm', $this->data);
    }
    
    
   
     public function reservationFormGet2(Request $request)
    {
        
         $thisDatex = array();
        $day = [];
        $counter =0;
        
    
     
            //  	foreach($check_users as $check_user){
            $days = DB::table('dentist_calanders')
       ->select("dentist_calanders.*","hospitals.*","services.*")
       ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
      ->join('services', 'dentist_calanders.service_id', '=', 'services.id')
       ->where('hospitals.active', 1)
        ->where('dentist_calanders.flag',0)
      ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->where('dentist_calanders.start_date', '<=', carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>', carbon::now()->todatestring())
      ->where('dentist_calanders.status', '=', 0)->get();
      
      //echo $days;

           foreach ($days as $key => $value) {
                $startTime = strtotime(carbon::now()->todatestring());
                $endTime = date(strtotime($value->end_date));
                $newtime=true;
                
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate=date('l', $i);
                     $finalhrs = array();
                     
                   
                    
                
                     
                   if ($thisDate==$value->day) {
                        
                        
                        
                          
         $hrs = DB::table('dentist_calanders')
       ->select("dentist_calanders.start_time")
       ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
       ->where('hospitals.active', 1)
        ->where('dentist_calanders.flag',0)
      ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->where('dentist_calanders.start_date', '<=', carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>', carbon::now()->todatestring())
     ->where('dentist_calanders.day', $value->day)
      ->where('dentist_calanders.status', '=', 0)
        ->groupby('start_time') ->get();
        
         $data = DB::table('dentist_calanders')
       ->select("dentist_calanders.*","hospitals.*","services.*")
       ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
      ->join('services', 'dentist_calanders.service_id', '=', 'services.id')
       ->where('hospitals.active', 1)
        ->where('dentist_calanders.flag',0)
      ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->where('dentist_calanders.start_date', '<=', carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>', carbon::now()->todatestring())
      ->where('dentist_calanders.status', '=', 0)
      ->where('dentist_calanders.day', $value->day)
       
      
      ->get();
      
      
        
        
        
        $newDate = date("Y-m-d", $i);
        
        foreach($hrs as $key => $valuex)
        {
         
         
        $count=DB::table('events')
        ->select("events.id")
        ->where('events.event_date','=',$newDate)
        ->where('events.treatment_id','=',$request->service_id)
        ->where('events.status','<>',"4")
         ->where('events.status','<>',"3")
        ->where('events.hospital_id','=',$request->hospital_id)
        ->where('events.start_time','=',$valuex->start_time)->count();
       
      
       
       
       if($count==0)
       {
        array_push($finalhrs,$valuex->start_time);
        
       }
       
       
        }
        
        
                      
   
   
                          
                        
                        if(count($finalhrs)!=0)
                        {
                             $date= date(' D,d F ', $i);
                             if(!in_array($date, $day))
                        {
                            
                          $temp=array($date,count($finalhrs),$finalhrs,$data);
                          array_push($thisDatex,$temp);
                          $day[]=$date;
                          $counter++;
                        }

                        
                        if($newtime)
                        {

                        $time[]=date(" g:i a ",strtotime( $value->start_time)); //*str_replace($en_data, $ar_data, date(" g:i a ",strtotime( $value->start_time)));  
                         $newtime=false;
                        }
                        
                        }

                        
                        
                      
                        
                        
                    }
                    // }
 //  $thisDatex;
                }
            }
      
        //echo json_encode($thisDatex);
        
        
       
             usort($thisDatex, array($this,'sortFunction'));
             
             
             
             
             
            $this->data['data']=$thisDatex;
              //$this->data['day']=$day;
              //$this->data['time']=$hrs;
             
            return view('views.booking', $this->data);
            
            
        
      
    }
    
    
    public function bookingdetails(request $request)
    {   
        
        if(isset(Auth::guard('client')->user()->id))
        {
            $this->data['user_id']=Auth::guard('client')->user()->id;
        
        $this->data['name']=Auth::guard('client')->user()->name;
        
        $this->data['hospital']=$request->hospital;
        $this->data['service']=$request->service;
        $this->data['date']= $request->date;
         $this->data['time']= $request->time;
         $this->data['hospital_id']=$request->hospital_id;
        $this->data['service_id']=$request->service_id;
         $this->data['date_raw']= date('Y-m-d',strtotime($request->date_raw));
         $this->data['time_raw']= $request->time_raw;
         $this->data['dentist_id']= $request->dentist_id;
    
       return view('views.client.reservation-appointment',$this->data);  
        }
        else
        {
            
             return redirect('/cLogin');
            
        }
        
       
    }

    /*public function reservationFormGet2(request $request)
    {

        /*if($_GET['user']==0){
        $user_id = Auth::guard('client')->user()->id;
        }else{
        $user_id = Auth::guard('client')->user()->id;
        //$follower_id = $request->follower_id;

        }*/
        /*$this->validate(
            $request,
            [
                'service_id' => 'required',
                'hospital_id' => 'required',
            ]
        );

        // $date = $_GET['date'];
        // $date = date('Y-m-d', strtotime($date));
        // $this->data['date'] = $date;
        $service_id = $_GET['service_id'];
        $hospital_id = $_GET['hospital_id'];
        $this->data['hospital_id'] = $hospital_id;
        $this->data['service_id'] = $service_id;
        // $user->created_by ='0';
       /* $this->data['times'] = DB::table('dentist_calanders')

            ->where('hospital_id', '=', $hospital_id)
            ->where('service_id', '=', $service_id)
        // ->where('start_date', '=', $date)
            ->get();*/
        //$this->data['times']=$dates;
        // $nameOfDay = date('l', strtotime($date));
        //echo $nameOfDay;
        // $this->data['times'] = "";

        // foreach ($dates as $datex) {
        //     /*$this->data['times']= DB::table('dentist_calanders')
        //      ->select("dentist_calanders.*")
        //      /*->select(DB::raw('*, max(id) as id'))*/
        //     /*->where('day','=',$nameOfDay)
        //    ->groupBy('start_time')

        //     ->get();*/
        //     $this->data['times'] = Dentist_calander::orderBy('id', 'desc')
        //         ->select('dentist_calanders.*', DB::raw('group_concat(dentist_id) as dentist_id'))
        //         ->where('day', '=', $nameOfDay)
        //         ->where('hospital_id', '=', $hospital_id)
        //         ->where('service_id', '=', $service_id)
        //         ->groupBy('start_time')
        //         ->get();
        //         //*var_dump($dates );

        // }
        // if ($this->data['times'] == "") {
        //     $this->data['error'] = "please check another date";
        //     return redirect('/reservation');
        // }
        // //$this->data['start']=$_GET['start'];
        // //var_dump($xx);
        // else {
        //     $this->data['error'] = "";
        // }
        /*$this->data['other_times'] = "";
        $this->data['other_times'] = Dentist_calander::orderBy('id', 'desc')
            ->select('dentist_calanders.*', DB::raw('group_concat(dentist_id) as dentist_id'))
        // ->where('end_date', '>', $date)
            ->where('hospital_id', '=', $hospital_id)
            ->where('service_id', '=', $service_id)
        // ->where('start_date', '=', $date)
            ->groupBy('start_time')
            ->get();

        return view('views.booking', $this->data);
    }*/

    public function reservationFormGet(request $request)
    {

        $this->validate(
            $request,
            [
                'service_id' => 'required',

                'hospital_id' => 'required',

            ]
        );

        $date = $_GET['date'];
        $date = date('Y-m-d', strtotime($date));
        $this->data['date'] = $date;
        $service_id = $_GET['service_id'];
        $hospital_id = $_GET['hospital_id'];
        $this->data['hospital_id'] = $hospital_id;
        $this->data['service_id'] = $service_id;
        // $user->created_by ='0';
        $this->data['times'] = Dentist_calander::orderBy('id', 'desc')
            ->select('dentist_calanders.*', DB::raw('group_concat(DISTINCT dentist_calanders.dentist_id) as dentist_id'))

            ->where('hospital_id', '=', $hospital_id)
            ->where('service_id', '=', $service_id)
            ->where('status', '=', 0)
        //->where('start_time','>=',Carbon::now()->format('H:i:s'))
            ->groupBy('start_time')
            ->get();

        //var_dump($this->data['times']);

        foreach ($this->data['times'] as $item) {
            $dentist_id = explode(",", $item->dentist_id);
        }

        if ($this->data['times'] == "") {
            $this->data['error'] = "please check another date";
            return redirect('/reservation');
        } else {
            $this->data['error'] = "";
        }
        $this->data['other_times'] = "";
        $this->data['other_times'] = Dentist_calander::orderBy('id', 'desc')
            ->select('dentist_calanders.*', DB::raw('group_concat(dentist_id) as dentist_id'))
            ->where('end_date', '>', $date)
            ->where('hospital_id', '=', $hospital_id)
            ->where('service_id', '=', $service_id)
            ->where('start_date', '=', $date)
            ->where('status', '=', 0)
            ->groupBy('start_time')
            ->get();

        return view('event.reservationFormRest', $this->data);
    }

    public function reservationFormGetOld(request $request)
    {

        /*if($_GET['user']==0){
        $user_id = Auth::guard('client')->user()->id;
        }else{
        $user_id = Auth::guard('client')->user()->id;
        //$follower_id = $request->follower_id;

        }*/
        $this->validate(
            $request,
            [
                'service_id' => 'required',

                'hospital_id' => 'required',

            ]
        );

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
        $this->data['nameOfDay'] = $nameOfDay;
        $this->data['times'] = "";

        foreach ($dates as $datex) {
            /*$this->data['times']= DB::table('dentist_calanders')
            ->select("dentist_calanders.*")
            /*->select(DB::raw('*, max(id) as id'))*/
            /*->where('day','=',$nameOfDay)
            ->groupBy('start_time')

            ->get();*/
            $this->data['times'] = Dentist_calander::orderBy('id', 'desc')
                ->select('dentist_calanders.*', DB::raw('group_concat(dentist_id) as dentist_id'))
                ->where('start_date', '<', $date)
                ->where('end_date', '>', $date)
                ->where('hospital_id', '=', $hospital_id)
                ->where('service_id', '=', $service_id)
                ->groupBy('dentist_id')
                ->get();

            //
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

        //var_dump($this->data['other_times']);
        return view('event.reservationFormRest', $this->data);
    }

    public function search($start, $hospital, $service, $date, $dentist)
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
            //   return redirect(session('link'));

            //   return redirect(URL::previous());
        }

        $user_name = Auth::guard('client')->user()->name;
        $user_id = Auth::guard('client')->user()->id;
        $followers = DB::table('followers')
            ->where('user_id', $user_id)
            ->get();
        $service_name = DB::table('services')
            ->where('id', $service)
            ->get();
        $hospital_name = DB::table('hospitals')
            ->where('id', $hospital)
            ->get();
        $check_user = DB::table('events')
            ->where('user_id', $user_id)
            ->where('event_date', $date)
            ->where('start_time', $start)
            ->where('hospital_id', $hospital)
            ->where('treatment_id', $service)
            ->whereIn('status', [1, 5])
            ->get();

        if (count($check_user)) {
            return redirect('NotValid');
        }
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

        if (count($check_user2)) {
            return redirect('NotValid');
        }
        //$service_name=$service_name['service_name_ar'];
        //echo $segment = Request::segment(1);
        //echo $request->route('start');
        $nationalitys = Nationality::all();
        return view('event.reservationFormFinish', ['nationalitys' => $nationalitys, 'start' => $start, 'hospital' => $hospital, 'service' => $service, 'date' => $date, 'dentist' => $dentist, 'service_name' => $service_name, 'hospital_name' => $hospital_name, 'user_name' => $user_name, 'followers' => $followers]);
    }

    public function notValid()
    {
        return view('event.notValid');
    }

    public function store(request $request)
    {
        $this->validate(
            $request,
            [
                'user' => 'required',
                'follower_id' => 'required_if:user,==,1',

            ]
        );

        $events = new Event;

        if ($request->user == 0) {
            $events->user_id = Auth::guard('client')->user()->id;
        } else {
            $events->user_id = Auth::guard('client')->user()->id;
            //*$event->follower_id = $request->follower_id;
            $events->relation = 1;
        }

        $events->start_time = $request->start;
        //*$event->calander_id = $request->calander_id;
        $events->event_date = $request->date;
        $events->device_id = Auth::guard('client')->user()->device_id;

        $events->treatment_id = $request->service;
        $events->hospital_id = $request->hospital;
        $events->dentist_id = $request->dentist;
        $events->dentist_b_id = $request->dentist;
        $events->diseases = $request->diseases;

        $events->drugs = $request->drugs;
        $events->description = $request->notes;
        
        $files=$request->file('files');
        
        for($z=0;$z<count($files);$z++)
        {
            if ($z==0) {
             $request->photo0=$files[$z];    
            $name = date('His') . $request->photo0->getClientOriginalName();
            $request->photo0->move(public_path('/images'), $name);
            $events->photo = $name;
        }

        if ($z==1) {
             $request->photo1=$files[$z];
            $name2 = date('His') . $request->photo1->getClientOriginalName();
            $request->photo1->move(public_path('/images'), $name2);
            $events->photo2 = $name2;
        }

        if ($z==2) {
             $request->photo2=$files[$z];
            $name3 = date('His') . $request->photo2->getClientOriginalName();
            $request->photo2->move(public_path('/images'), $name3);
            $event->photo3 = $name3;
        }

        if ($z==3) {
             $request->photo3=$files[$z];
            $name4 = date('His') . $request->photo3->getClientOriginalName();
            $request->photo3->move(public_path('/images'), $name4);
            $events->photo4 = $name4;
        }

        if ($z==4) {
             $request->photo4=$files[$z];
            $name5 = date('His') . $request->photo4->getClientOriginalName();
            $request->photo4->move(public_path('/images'), $name5);
            $events->photo5 = $name5;
        }
            
            
        }
        
    
    
        

        $events->save();
        $event_id = $events->id;

        $event = DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")
            ->join('services', 'events.treatment_id', '=', 'services.id')
            ->where('events.id', $event_id)
            ->get();

        $dentists = explode(',', $request->dentist);

        if (count($dentists) > 1 && $request->dentist != null) {
            $tokenList = [];

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

                $tokenList[] = $dentist->device_id;
            }

            if ($dentist->language == 'ar') {
                $body = 'لديك حجز موعد بانتظار اعتمادك #.' . $event_id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = 'You have an appointment waiting for your approval #.' . $event_id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
            }

          $events = new Event;            
                                     
           $events->sendmessage($body,$tokenList);
            
        } else {
            $dentist = Dentist::where('id', $request->input('dentist'))
                ->first();
            $notification = new User_notification;
            $notification->dentist_id = $request->input('dentist');
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
            $events = new Event;
           $events->sendmessage($body,$token);
        }

        $request->session()->flash("message", "تم اضافة الحجز بنجاح بانتظار اعتماد الطبيب");

        return redirect('/UAReservation');
    }

    /*public function store(request $request)
    {

    $event = new Event;
    if($request->user_id==0){
    $event->user_id = Auth::guard('client')->user()->id;
    }else{
    $event->user_id = Auth::guard('client')->user()->id;
    $event->follower_id = $request->follower_id;
    $event->relation = 1;
    }
    $date=explode('/', $request->date);
    $event->start_date = $date[0];
    $event->end_date = $date[1];
    $time=explode('/', $request->time);
    $event->start_time = $time[0];
    $event->end_time = $time[1];
    $event->day = $request->day;
    //

    $event->treatment_id = $request->service_id;
    $event->hospital_id = $request->hospital_id;
    $event->is_diseases = $request->is_diseases;
    $event->diseases = $request->diseases;
    $event->is_drugs = $request->is_drugs;
    $event->drugs = $request->drugs;
    $event->description = $request->description;
    if($request->photo)
    {
    $name = time().'.'.$request->photo->getClientOriginalExtension();
    $request->photo->move(public_path('/images'),$name);
    $event->photo = $name;
    }

    // $user->created_by ='0';
    $event->save();
    $request->session()->flash("message", "تم اضافة العضو بنجاح" );

    return redirect('/UReservation');
    }*/
    public function accepet(request $request, $id)
    {
        if ($id) {
            $searchString = ',';

            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "services.*")
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();

            if ($event[0]->status == 3 || $event[0]->status == 4) {
                return back()->with('error', ' تم الاعتذار عن الموعد');
            }

            $docs = $event[0]->dentist_id;

            $dentist = Auth::guard('dentist')->user();

            $dentist_id = $dentist->id;

            $update = DB::table('events')
                ->where('id', $id)
                ->where('status', 0)
                ->update(['status' => 1, 'dentist_approved' => 1, 'dentist_id' => $dentist_id]);

            if ($update) {
                DB::table('dentist_calanders')
                    ->where('hospital_id', $event[0]->hospital_id)
                    ->where('service_id', $event[0]->treatment_id)
                    ->where('start_date', $event[0]->event_date)
                    ->where('created_at', $event[0]->created_at)
                    ->where('start_time', $event[0]->start_time)
                    ->where('dentist_id', $dentist_id)
                    ->update(['status' => 1, 'flag' => 1]);

                //check another appointemnet for this dector and remove it
                $event_statuss = Event::where('hospital_id', $event[0]->hospital_id)
                    ->where('treatment_id', $event[0]->treatment_id)
                    ->where('event_date', $event[0]->event_date)
                    ->where('start_time', $event[0]->start_time)
                    ->where('status', 0)
                    ->get();

                if ($event_statuss) {
                    foreach ($event_statuss as $event_status) {
                        $search = $event_status->dentist_id;
                        //exit();

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
                                ->update(['status' => 3, 'user_notify' => 0]);

                            $notification = new User_notification;
                            $notification->user_id = $event_status->user_id;
                            $notification->service_id = $event_status->treatment_id;
                            $notification->event_id = $event_status->id;
                            $notification->title = 'طبيب اسنان مجاني';
                            $notification->mesg = 'يعتذر الطبيب ﻹلغاء الموعد';
                            $notification->save();

                            $token = $event_status->device_id;

                            $user_lang = User::find($event_status->user_id)->language;
                            //dd($event_status);
                            if ($user_lang == 'ar') {
                                $body = 'نعتذر لعدم إعتماد موعدك #.' . $event_status->id . ' بتاريخ ' . $event_status->event_date . ' لخدمة ' . $event_status->service->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event_status->start_time)) . ' بإمكانك حجز موعد اخر ';
                            } else {
                                $body = 'We apologize for not approving your appointment #.' . $event_status->id . ' with date ' . $event_status->event_date . ' for the service ' . $event_status->service->service_name_en . ' at ' . date('H:i A', strtotime($event_status->start_time)) . ' You can book another appointment';
                            }

                            if ($token) {
                                   $events = new Event;            
                              $events->sendmessage2($body,$token);
                            }
                        }
                    }
                }

                $query = 'SELECT x.* FROM lexx_participants x left join lexx_participants y on x.thread_id=y.thread_id where x.user_id=' . $event[0]->user_id . ' and x.type=2 and y.user_id=' . $dentist_id . ' and y.type=1';
                $res = DB::select($query);

                if (!isset($res[0])) {
                    $thread = Thread::create(['subject' => 'محادثةدكتور' . $dentist->name, 'start_date' => Carbon::now()->format('Y-m-d'), 'end_date' => $event[0]->event_date]);
                    // Message
                    $message = DB::table('lexx_messages')->insert(['thread_id' => $thread->id,
                        'user_id' => $dentist_id, 'type' => 1,
                        'body' => 'مرحبا يمكنك بدأ المحادثة', 'created_at' => Carbon::now()]);
                    // Sender
                    DB::table('lexx_participants')->insert(['thread_id' => $thread->id,
                        'user_id' => $event[0]->user_id, 'type' => 2,
                        'last_read' => Carbon::now()->format('Y-m-d'), 'created_at' => Carbon::now()]);
                    DB::table('lexx_participants')->insert(['thread_id' => $thread->id,
                        'user_id' => $dentist_id, 'type' => 1,
                        'last_read' => Carbon::now()->format('Y-m-d'), 'created_at' => Carbon::now()]);
                }

                $request->session()->flash('meassage', 'good');

                $notification = new User_notification;
                $notification->user_id = $event[0]->user_id;
                $notification->service_id = $event[0]->treatment_id;
                $notification->event_id = $id;
                $notification->title = 'طبيب اسنان مجاني';
                $notification->mesg = 'لقد تم اعتماد موعدك';
                $notification->save();

                $token = $event[0]->device_id;

                $user_lang = User::find($event[0]->user_id)->language;

                if ($user_lang == 'ar') {
                    $body = 'لقد تم اعتماد موعدك #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                } else {
                    $body = 'Your appointment has been approved #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
                }

                if ($token) {
                     $events = new Event;            
                              $events->sendmessage2($body,$token);
                }

                if (strpos($docs, $searchString) !== false) {
                    $array = str_replace($dentist_id, "", $docs);
                    $array = str_replace(',,', ',', $array);
                    $array = explode(',', trim($array, ','));

                    foreach ($array as $doc_id) {
                        $dentist = Dentist::find($doc_id);

                        $token = $dentist->device_id;

                        $user_lang = $dentist->language;

                        if ($user_lang == 'ar') {
                            $body = 'لقد قام طبيب آخر باعتماد الموعد #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
                        } else {
                            $body = 'Another doctor approved the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
                        }

                       $events = new Event;            
                              $events->sendmessage($body,$token);

                        $notification = new User_notification;
                        $notification->dentist_id = $doc_id;
                        $notification->service_id = $event[0]->treatment_id;
                        $notification->event_id = $id;
                        $notification->title = 'طبيب اسنان مجاني';
                        $notification->mesg = 'تم اعتماد الموعد من طبيب اخر';
                        $notification->save();
                    }

                    //return $result;
                }
            }
        }

        return redirect('/dUAReservation');
    }

    public function userAccepet(request $request, $id)
    {
        if ($id) {
            $user_id = Auth::guard('client')->user()->id;
            $event_date = DB::table('events')->where('id', $id)->first()->event_date;
            // $now_date = Carbon::now()->addDays(1)->format('Y-m-d');
            // $date1 = new DateTime($event_date);
            // $date2 = new DateTime($now_date);
            // $interval = $date1->diff($date2);

            // if( $interval->d == 0 && $interval->y == 0){
            DB::table('events')
                ->where('id', $id)
                ->update(['status' => 2, 'dentist_notify' => 0]);

            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "dentists.*", "services.*")
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();

            $notification = new User_notification;
            $notification->dentist_id = $event[0]->dentist_id;
            $notification->service_id = $event[0]->treatment_id;
            $notification->event_id = $id;
            $notification->title = 'طبيب اسنان مجاني';
            $notification->mesg = 'لقد تم تأكيد الحضور على موعد';
            $notification->save();

            $token = $event[0]->device_id;
            $user_lang = User::find($event[0]->user_id)->language;

            if ($user_lang == 'ar') {
                $body = 'لقد تم تأكيد الحضور على موعد#.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = 'Attendance has been confirmed for the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
            }

                                   $events = new Event;            
                              $events->sendmessage($body,$token);

            return redirect('/UAReservation');

            // }else{
            //   return back()->with('error','يرجى تأكيد حضورك قبل يوم واحد من الموعد');

            // };
        }
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
                Session::flash('message', 'تم الاعتذار عن الموعد بالفعل');

                return redirect()->back();
            }

            $dentist_id = Auth::guard('dentist')->user()->id;

            Dentist_calander::where('dentist_id', $dentist_id)->where('service_id', $event[0]->treatment_id)->first()->update([
                'status' => 0,
                'flag' => 0,
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
                DB::table('events')
                    ->where('id', $id)
                    ->update(['status' => 3, 'user_notify' => 0]);

                $notification = new User_notification;
                $notification->user_id = $event[0]->user_id;
                $notification->service_id = $event[0]->treatment_id;
                $notification->event_id = $id;
                $notification->title = 'طبيب اسنان مجاني';
                $notification->mesg = 'يعتذر الطبيب ﻹلغاء الموعد';
                $notification->save();

                $token = $event[0]->device_id;
                $user_lang = User::find($event[0]->user_id)->language;

                if ($user_lang == 'ar') {
                    $body = 'نعتذر لعدم إعتماد موعدك #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time)) . ' بإمكانك حجز موعد اخر ';
                } else {
                    $body = 'We apologize for not approving your appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time)) . ' You can book another appointment';
                }

                if ($token) {
                                                       $events = new Event;            
                              $events->sendmessage2($body,$token);
                }
            }
        }

        return redirect('/dUAReservation');
    }

    public function userNeglect(request $request, $id)
    {
        if ($id) {
            $event = Event::where('id', $id)
                ->first();

            if ($event->status !== 0) {
                DB::table('dentist_calanders')
                    ->where('hospital_id', $event->hospital_id)
                    ->where('service_id', $event->treatment_id)
                    ->where('start_date', $event->event_date)
                    ->where('dentist_id', $event->dentist_id)
                    ->update(['status' => 0]);
            }
            $event->update(['status' => 4]);

            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "dentists.*", "services.*")
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();

            $dentists = explode(',', $event[0]->dentist_id);
            $tokenList = [];
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
            // $user_lang = User::find($event[0]->user_id)->language;

            if ($dentist->language == 'ar') {
                $body = ' يعتذر المراجع ﻹلغاء الموعد #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = ' The patient apologizes for canceling the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
            }

            $events = new Event;            
      $events->sendmessage($body,$token);

            $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم الغاء الموعد من قبل المراجع";
            Session::flash("message", $message);

            return redirect('/UAReservation');
        }
    }

    public function approveArrival(request $request, $id)
    {

        //status 3 confrim arrival
        if ($id) {
            $date = date("Y-m-d");
            DB::table('events')
                ->where('id', $id)
                
                ->update(['status' => 5, 'user_notify' => 0]);

            $event = DB::table('events')
                ->select("events.*", "events.id As event_id", "services.*")
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->where('events.id', $id)
                ->get();

            $notification = new User_notification;
            $notification->user_id = $event[0]->user_id;
            $notification->service_id = $event[0]->treatment_id;
            $notification->event_id = $id;
            $notification->title = 'طبيب اسنان مجاني';
            $notification->mesg = 'لقد تم تسجيل وصولك لموعد';
            $notification->save();

            $token = $event[0]->device_id;
            $user_lang = User::find($event[0]->user_id)->language;

            if ($user_lang == 'ar') {
                $body = 'لقد تم تسجيل وصولك لموعد#.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = 'Your arrival have been registered for the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
            }

            if ($token) {
                $events = new Event;            
      $events->sendmessage2($body,$token);
            }

            $message = (app()->getLocale() == 'en') ? "Arrival has been confirmed successfully" : "تم تأكيد الوصول";
            Session::flash("message", $message);
        }

        return redirect('/dUAReservation');
    }

    public function details($id)
    {
        if (!Auth::guard('client')->check()) {
            return redirect('cLogin');
            //   return redirect(session('link'));

            //   return redirect(URL::previous());
        }
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
                    "users.mobile As Umobile",
                    "users.name As Uname"
                )
                ->leftJoin('services', 'events.treatment_id', '=', 'services.id')
                ->leftJoin('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->leftJoin('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                ->leftJoin('users', 'events.user_id', '=', 'users.id')
                ->where('events.id', $id)
                ->get();
            $follower = "";
            if (isset($this->data['object'][0]) && $this->data['object'][0]->follower_id != "") {
                $follower = Follower::where('followers.id', $this->data['object'][0]->follower_id)
                    ->get();
            }

            if ($this->data['object'][0]->status != 1) {
                $this->data['object'][0]->Umobile = '';
            }
            $this->data['follower'] = $follower;
            return view('views.client.appointment-details', $this->data);
        }
    }

    public function detailsD($id)
    {
        if (!Auth::guard('dentist')->check()) {
            return redirect('dLogin');
            //   return redirect(session('link'));

            //   return redirect(URL::previous());
        }
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
                    "users.mobile As Umobile",
                    "users.name As Uname"
                )
                ->join('services', 'events.treatment_id', '=', 'services.id')
                ->join('dentists', 'events.dentist_id', '=', 'dentists.id')
                ->join('hospitals', 'events.hospital_id', '=', 'hospitals.id')
                ->join('users', 'events.user_id', '=', 'users.id')
                ->where('events.id', $id)
                ->get();
            //var_dump($this->data['object']);
            $follower = "";
            if ($this->data['object'][0]->follower_id != "") {
                $follower = Follower::where('followers.id', $this->data['object'][0]->follower_id)
                    ->get();
            }

            if ($this->data['object'][0]->status != 1) {
                $this->data['object'][0]->Umobile = '';
            }
            $this->data['follower'] = $follower;
            return view('views.dentist.appointment-details', $this->data);
        }
    }
}
