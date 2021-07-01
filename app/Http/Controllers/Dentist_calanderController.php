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

    class Dentist_calanderController extends Controller
    {

        public function showCalanderForm ()
        {
            if (!Auth::guard('dentist')->check()) {
                return redirect('dLogin');
            }
            $dentist_id = Auth::guard('dentist')->user()->id;
            $datas = DB::table('dentist_calanders')
            ->where('dentist_id', '=', $dentist_id)
            ->where('dentist_calanders.start_date','>=',Carbon::now()->toDateString())
            ->groupBy('day')->get();

            $day_data = "";
            if (!empty($datas)) {
                foreach ($datas as $date) {
                    $day_data = DB::table('dentist_calanders')
                    ->where('dentist_id', '=', $dentist_id)
                    ->where('dentist_calanders.start_date','>=',Carbon::now()->toDateString())
                    ->where('day', '=', "$date->day")->get();
                }
                $day_data;
            }

            $services = Service::orderBy('sort', 'asc')->get();
            //	$hospitals = Hospital::all();
            $hospital_id = Auth::guard('dentist')->user()->hospital;

            return view('views.dentist.schedule')->with(['services' => $services, 'hospital_id' => $hospital_id, "datas" => $datas, 'day_data' => $day_data]);
        }//


        public function calanderAction (Request $request)
        {
              $this->validate(
            $request,
            [
                'hospital_id' => 'required|numeric',
                'service_id'     => 'required|numeric',                
                'morning_time' => 'required_without:noon_time',
                'noon_time' => 'required_without:morning_time',
                'day' => 'nullable|required_with:end_date',

            ]
        );
        
        

        if($request->day==='0')
        {

            $error_message = (app()->getLocale() == 'en') ? "You have to select a day and one duration at least" : "يجب اختيار اليوم و فترة واحدة علي الاقل";
                    Session::flash('error_message', $error_message);
                    
                    return redirect('/add_calander');
                    
                    
                    
        }
    
                if($request->morning_time=='0' && $request->noon_time=='0' )
        {
            
            $error_messages = (app()->getLocale() == 'en') ? "You have to select  one duration at least" : "يجب اختيار فترة واحدة علي الاقل ";
                    Session::flash('error_message', $error_messages);
                    return redirect('/add_calander');
        }
            
             $founds = DB::table('dentist_calanders')
            ->where('dentist_id', '=', Auth::guard('dentist')->user()->id)
            ->where( 'day',$request->day)
            ->where('flag','0')->count();
            
            
           
            
         if($founds>=2){
                  
                   
                    $error_message = (app()->getLocale() == 'en') ? "the date was set before" : " لا يمكن اضافةاكثر من موعدين في اليوم  ";
                    Session::flash('error_message', $error_message);
                    return redirect('/add_calander');
                    
         }
            
            if($request->morning_time)
            {
              
                 $found = DB::table('dentist_calanders')
            ->where('dentist_id', '=', Auth::guard('dentist')->user()->id)

            ->where( 'day',$request->day)
            ->where('flag','0')      
                        ->whereNested(function($query)  {
        /** @var Builder $query */
        $query
            ->where('start_time', '08:00:00' )
            ->orwhere('start_time', '09:00:00' )
            ->orwhere('start_time', '10:00:00' );
    })->count();
                     
          
               
             
                
                if($found>0){
                  
                    if($request->noon_time=="0")
                    {
                    $error_message = (app()->getLocale() == 'en') ? "You cannot more than on appointment in the same duration" : "لا يمكن اضافة موعدين بنفس الفترة";
                    Session::flash('error_message', $error_message);
                    return redirect('/add_calander');
                    }
                    
                   
                }
               else
               {
                   
              
                     $calander = new Dentist_calander;
            $calander->dentist_id = Auth::guard('dentist')->user()->id;
            $calander->service_id = $request->service_id;
            $calander->hospital_id = $request->hospital_id;
            $calander->start_date = "2021-01-15";
            $calander->day =$request->day;
            $calander->end_date ="2021-04-29";	
            $calander->start_time = $request->morning_time;
           
            $calander->save();
            
            
                } 
           
            }
        if($request->noon_time)
            {
            $founded = DB::table('dentist_calanders')
            
            ->where('dentist_id', '=', Auth::guard('dentist')->user()->id)
            ->where('service_id',$request->service_id)
            ->where( 'day',$request->day)
            ->where('flag','0')
            ->whereNested(function($query)  {
        /** @var Builder $query */
        $query
            ->where('start_time', '13:00:00' )
            ->orwhere('start_time', '14:00:00' )
            ->orwhere('start_time', '15:00:00' );
    })->count();



        

         
                if($founded>0){
                    $error_message = (app()->getLocale() == 'en') ? "the date was set before" : "لقد تم اضافة الموعد بالفعل";
                    Session::flash('error_message', $error_message);
                    return redirect('/add_calander');
                }
           
                  $calander = new Dentist_calander;
            $calander->dentist_id = Auth::guard('dentist')->user()->id;
            $calander->service_id = $request->service_id;
            $calander->hospital_id = $request->hospital_id;
            $calander->start_date = "2021-01-15";
            $calander->day =$request->day;
            $calander->end_date ="2021-04-29";	
            $calander->start_time = $request->noon_time;
            
            $calander->save();
            }
          
            
          
           
      
      




            
            $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم اضافة الموعد بنجاح";
            Session::flash('message', $message);

            return redirect('/add_calander');
            //   }


        }

        public function calander ($id)
        {
            if (!Auth::guard('dentist')->check()) {
                return redirect('dLogin');
            }
            $dentist_id = Auth::guard('dentist')->user()->id;
            $object = DB::table('dentist_calanders')
                ->where('id', '=', $id)
                ->first();
            //dd($datas);

            $services = Service::orderBy('sort', 'asc')->get();
            $hospitals = Hospital::all();
            //echo	$dentist_id = Auth::guard('dentist')->user()->name;
            return view('views.dentist.edit-schedule')->with(['services' => $services, 'hospitals' => $hospitals, "object" => $object]);
        }//

        public function UpdateCalander (Request $request, $id)
        {

            if ($request->morning_time) {
              

            $calander = Dentist_calander::find($id);

            
           

            $calander->dentist_id = Auth::guard('dentist')->user()->id;
            $calander->service_id = $request->service_id;

           
            
            $calander->start_time = $request->morning_time;
            

            $calander->update();
                
            if ($calander) {
                //	echo 'd';

                $message = (app()->getLocale() == 'en') ? "successfully Added" : "تم التسجيل بنجاح";
                Session::flash('message', $message);


                return redirect('/add_calander');
            }
                
            }

        }

        public function destroy ($id)
        {

          $calander = Dentist_calander::find($id);
             $calander->flag='-1';
             $calander->update();
            

            return redirect()->back();
        }
    }
