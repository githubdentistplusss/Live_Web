<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dentist_calander;
use App\Service;
use App\Hospital;
use Auth;
use Session;
use Route;
use Carbon\Carbon;
use DB;
use DateTime;
use DatePeriod;
use DateInterval;

class ApiDentist_calanderController extends Controller
{
    public function showCalanderForm(request $request)
    {
        $dentist_id = $request->dentist_id;
        $datas= DB::table('dentist_calanders')
            ->where('dentist_id', '=', $dentist_id)
            ->where('dentist_calanders.start_date', '>=', Carbon::now()->toDateString())
              ->groupBy('day')
            ->get();
        //dd($datas);
        $day_data="";
        if (!empty($datas)) {
            foreach ($datas as $date) {
                $day_data = DB::table('dentist_calanders')
            ->where('dentist_id', '=', $dentist_id)
            ->where('dentist_calanders.start_date', '>=', Carbon::now()->toDateString())
            ->where('day', '=', "$date->day")

            ->get();
                //var_dump($day_data);
            }
            $day_data;
        } else {
            return response()->json(['status'=>'Not Found']);
        }
        $services = Service::orderBy('sort', 'asc')->get();
        $hospitals = Hospital::all();
        //echo	$dentist_id = Auth::guard('dentist')->user()->name;

        return response()->json(['services'=>$services,'hospitals'=>$hospitals ,"service_datas"=>$datas,'day_data'=>$day_data,'status'=>'success']);
    }//
    public function showCalanderForm2(request $request)
    {
        $dentist_id = $request->dentist_id;

        $day_data   = DB::table('dentist_calanders')
            ->select("dentist_calanders.*", "dentist_calanders.id As calander_id", "dentists.*", "dentists.name As D_name", "dentists.id As D_id", "hospitals.*", "hospitals.id As H_id", "services.id As S_id", "services.*")
            ->join('services', 'dentist_calanders.service_id', '=', 'services.id')
            ->join('dentists', 'dentist_calanders.dentist_id', '=', 'dentists.id')
            ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
            ->where('dentist_id', '=', $dentist_id)
            ->where('dentist_calanders.start_date', '<=', Carbon::now()->toDateString())
            ->get();

        return response()->json(['day_data'=>$day_data,'status'=>'success']);
    }

    public function calanderAction(Request $request)
    {
        $this->validate(
            $request,
            [
                'hospital_id' => 'required|numeric',
                'service_id'     => 'required|numeric',
                
                'morning_time' => 'nullable',
                'noon_time' => 'nullable',
                
                'day' => 'nullable|required_with:end_date',

            ]
        );
         $calendar = Dentist_calander::where('dentist_id', $request->dentist_id)->where('day', $request->day)->where('start_time', $request->morning)->where('hospital_id', request('hospital_id'))->first();
                     

        if (isset($calendar)) {
            return response()->json(['status'=>'This appointment is not available']);
        }
     
     
           if($request->morning)
           {
               $calander = new Dentist_calander;
            $calander->dentist_id = $request->dentist_id;
            $calander->service_id = $request->service_id;
            $calander->hospital_id = $request->hospital_id;
            $calander->start_date = $request->start_date;
            $calander->day =$request->day;
            $calander->end_date =$request->end_date;	
            $calander->start_time = $request->morning;
          
            $calander->save();
           }
          
            
      if($request->noon)
           {
               $calander = new Dentist_calander;
            $calander->dentist_id = $request->dentist_id;
            $calander->service_id = $request->service_id;
            $calander->hospital_id = $request->hospital_id;
            $calander->start_date = $request->start_date;
            $calander->day =$request->day;
            $calander->end_date =$request->end_date;	
            $calander->start_time = $request->noon;
          
            $calander->save();
           }


      




        if ($calander) {
            //	echo 'd';

            return response()->json(['data'=>$calander,'status'=>'1']);
        }
    }

    public function calanderAction2(Request $request)
    {
        $validation=$this->validate(
            $request,
            [
                'hospital_id' => 'required|numeric',

                'service_id'     => 'required|numeric',



            ]
        );
        /*if($validation){

         return response()->json(['status'=>'error']);
        } */
        $calander = Dentist_calander::find($request->calander_id);

        $calander->dentist_id = $request->dentist_id;
        $calander->service_id = $request->service_id;
        $calander->hospital_id = $request->hospital_id;
        $calander->start_date = Carbon::parse($request->start_date)->format('Y-m-d');
        if ($request->end_date==$request->start_date) {
            $calander->day =		date('l', strtotime($request->start_date));
            $calander->end_date =	date('Y-m-d', strtotime("+1 day", strtotime($request->start_date)));
        } else {
            $calander->end_date =Carbon::parse($request->end_date)->format('Y-m-d');
            $calander->day = $request->day;
        }
        //    $calander->end_date = $request->end_date;
        $calander->start_time = $request->start_time;
        
        //   $calander->day = $request->day;


        $calander->update();

        if ($calander) {
            //	echo 'd';

            return response()->json(['data'=>$calander,'status'=>'success']);
        }
    }


    public function destroy(Request $request)
    {
        //echo 'jjj';
        if ($request->id) {
            if (Dentist_calander::find($request->id)) {
                Dentist_calander::find($request->id)->delete();

                return response()->json(['status'=>'sucess']);
            } else {
                return response()->json(['status'=>'Not found']);
            }
        } else {
            return response()->json(['status'=>'Not found']);
        }
    }
    public function selectDay(Request $request)
    {
        $thisDatex = [];
        $day = [];

        //echo $request->hospital_id;
        //exit();
        $check_users=DB::table('events')->where('hospital_id', $request->hospital_id)
              ->where('treatment_id', $request->service_id)->get();
        if (count($check_users)) {
            //  	foreach($check_users as $check_user){
            $days = DB::table('dentist_calanders')
       ->select("dentist_calanders.*")
       ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
       ->where('hospitals.active', 1)
        ->where('dentist_calanders.flag',0)
      ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->where('dentist_calanders.start_date', '<=', carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>', carbon::now()->todatestring())
      ->where('dentist_calanders.status', '=', 0)

    ->groupBy('day')
    ->get();


            foreach ($days as $key => $value) {
                $startTime = strtotime(carbon::now()->todatestring());
                $endTime = date(strtotime($value->end_date));
                //$thisDatex = "";
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate=date('l', $i);
                    // $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                    if ($thisDate==$value->day) {
                        //echo $thisDate = date( 'Y-m-d', $i );
                        $thisDatex[]= date('Y-n-j', $i);
                        $day[]=$value->day;
                    }
                    // }
 //  $thisDatex;
                }
            }
        } else {
            $days = DB::table('dentist_calanders')
         ->join('hospitals', 'dentist_calanders.hospital_id', '=', 'hospitals.id')
         ->where('hospitals.active', 1)
    ->where('dentist_calanders.service_id', $request->service_id)
    ->where('dentist_calanders.hospital_id', $request->hospital_id)
    ->where('dentist_calanders.start_date', '<=', carbon::now()->todatestring())
    ->where('dentist_calanders.end_date', '>', carbon::now()->todatestring())
    ->groupBy('start_date')
    ->get();

            foreach ($days as $key => $value) {
                $startTime = strtotime(carbon::now()->todatestring());
                $endTime = date(strtotime($value->end_date));
                //$thisDatex = "";
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate=date('l', $i);
                    // $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                    if ($thisDate==$value->day) {
                        //echo $thisDate = date( 'Y-m-d', $i );
                        $thisDatex[]= date('Y-n-j', $i);
                        $day[]=$value->day;
                    }
                }
                //  $thisDatex;
            }
        }
        //echo json_encode($thisDatex);
        return response()->json(['data'=>$thisDatex,'day'=>$day]);
    }
    
     static function sortFunction( $a, $b ) {
    return strtotime($a[0]) - strtotime($b[0]);
}
      
    
   
    public function selectDay2(Request $request)
    {
        
       
        
        $thisDatex = array();
        $day = [];
        $counter =0;
        $finalhrs = array();

       
       
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

            foreach ($days as $key => $value) {
                $startTime = strtotime(carbon::now()->todatestring());
                $endTime = date(strtotime($value->end_date));
                $newtime=true;
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate=date('l', $i);
                   
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
        

                          
                        
                        
                        $date= date(' D,d F ', $i);
                        

                         if(!in_array($date, $day))
                        {
                            
                          $temp=array($date,count($hrs),$hrs);
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
                    // }
 //  $thisDatex;
                }
            }
      
        //echo json_encode($thisDatex);
        
        
       
             usort($thisDatex, array($this,'sortFunction'));
             
             
           
        
        
        return response()->json(['daydata'=>$days,'day'=>$counter,'data'=>$thisDatex,'time'=>$hrs]);
    }
    
     public function selectDay3(Request $request)
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

            foreach ($days as $key => $value) {
                $startTime = strtotime(Carbon::now()->addDays(1)->todatestring());
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
                             $date= date(' D,d F Y ', $i);
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
             
             
           
        
        
        return response()->json(['day'=>$counter,'data'=>$thisDatex,'time'=>$hrs]);
    }

   
    public function getServices(Request $request)
    {
        $dentist_id = $request->dentist_id;

        $services = DB::table('dentist_calanders')
            ->select("services.*", "services.id As service_id", "dentist_calanders.*")
            ->join('services', 'dentist_calanders.service_id', '=', 'services.id')
            ->where('dentist_id', $dentist_id)
            ->where('dentist_calanders.start_date', '>=', Carbon::now()->toDateString())
            ->get();

        return response()->json(['services'=>$services]);
    }
}
