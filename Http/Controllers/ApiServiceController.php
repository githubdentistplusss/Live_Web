<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use App\Service;
    use App\per_user;
    use App\Dentist;
    use Carbon\Carbon;
    use App\Hospital;
    use DB;
    use Auth;
    use Session;

    class ApiServiceController extends Controller
    {


        public function index ()
        {
            $objects = Service::orderBy('sort', 'asc')->get();

            return response()->json(['data' => $objects, 'status' => 'success']);

        }

        public function hospitalByService (request $request)
        {
            $service_id = 7; //$request->service_id;
            $objects = "";
            $measure_unit = config("dentistplus.nearby_measure_unit");
            $objects = DB::table('dentist_calanders')
             ->join('hospitals', 'hospitals.id', '=', 'dentist_calanders.hospital_id')
              ->join('dentists', 'dentists.id', '=', 'dentist_calanders.dentist_id')
                ->select("hospitals.*", "hospitals.id As hospital_id", "dentist_calanders.*")
                ->selectRaw("( ? * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?)) + sin( radians(?) ) * sin( radians( latitude ) ))) As distance",[ $measure_unit, $request->latitude, $request->longitude, $request->latitude])
                
                ->where('dentist_calanders.service_id', $service_id)
                ->where('dentist_calanders.start_date','<=',Carbon::now()->todatestring())
                ->where('dentist_calanders.end_date','>',Carbon::now()->todatestring())
                ->where('hospitals.active', 1)
                ->where('dentists.active', 1)
                ->groupBy('hospitals.id')
                
                ->orderBy('distance', 'asc')
                ->get();
                echo '<pre>';
                $ob[]  = $objects[0];
                foreach ( $ob as $k =>$v ) 
                {
                    $v->hospital_name_en = ' TEST ';
                    break; 
                }
                $ob[] = $objects[0];
                $ob = $objects;
                        print_r( $ob);

                exit;
            if ($objects) {
           //     $ob =  new stdObject();
                $objects[]  = $objects[0];
                
                //$objects[0]->req_location = ''; //hospital_name_en
                //$objects[0]->hospital_id = '200'; 
                $objects[0]->hospital_name_en = 'test'; 
                
                //$objects[0]->hospital_name_ar = ' المنصة تربط بين المريض وطالب الأسنان ولا تمثل المستشفيات ';
                return response()->json(['data' => $objects, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لاتوجد مستشفى بها هذة الخدمة']);
            }


        }



        public function hospitals (request $request)
        {

            $measure_unit = config("dentistplus.nearby_measure_unit");

          
            $hospitals = \DB::table('hospitals')->selectRaw("*, ( ? * acos( cos( radians(?) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(?)) + sin( radians(?) ) * sin( radians( latitude ) ))) As distance",[ $measure_unit, $request->latitude, $request->longitude, $request->latitude])
            ->where('hospitals.active', 1)->orderBy('distance','asc')->get();

            if ($hospitals) {

                return response()->json(['hospitals' => $hospitals, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لاتوجد مستشفى بها هذة الخدمة']);
            }


        }

        public function servicesByCode (request $request)
        {
            $code = $request->code;
            $data = Dentist::where('code', '=', $code)->first();
            $dentist_id = $data->id;
            $objects = "";
            $objects = DB::table('services')
                ->select("services.*", "services.id As service_id", "dentist_calanders.*")
                ->join('dentist_calanders', 'dentist_calanders.service_id', '=', 'services.id')
                ->whereRaw("find_in_set($dentist_id,dentist_calanders.dentist_id)")
                ->where('dentist_calanders.end_date', '>', Carbon::now()->toDateString())
                ->where('dentist_calanders.start_date','<=',carbon::now()->todatestring())
                ->groupBy('services.id')
                ->orderBy('services.sort', 'asc')->get();
            if ($objects) {
                return response()->json(['data' => $objects, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لاتوجد خدمات لهذا الطبيب']);
            }


        }

        public function searchBycode (Request $request)

        {

            $thisDatex = [];
            $day = [];

            $days = DB::table('dentist_calanders')
            ->join('dentists','dentists.id','=','dentist_id')
             ->where('dentists.active', '1')
                ->where('dentist_calanders.service_id', $request->service_id)
                ->where('dentist_calanders.dentist_id', $request->dentist_id)
                ->where('dentist_calanders.end_date', '>', Carbon::now()->toDateString())
                ->where('dentist_calanders.start_date','<=',carbon::now()->todatestring())
   	            ->groupBy('start_date')
                ->orderBy('start_date', 'DESC')
                ->get();
          
            foreach ($days as $key => $value) {
                $startTime = strtotime(Carbon::now()->toDateString());
                $endTime = date(strtotime($value->end_date));
                for ($i = $startTime; $i <= $endTime; $i = $i + 86400) {
                    $thisDate = date('l', $i);
                    // $thisDate = date( 'Y-m-d', $i ); // 2010-05-01, 2010-05-02, etc
                    if ($thisDate == $value->day) {
                        //echo $thisDate = date( 'Y-m-d', $i );
                        $thisDatex[] = date('Y-n-j', $i);
                        $day[] = $value->day;
                    }
                }
                //  $thisDatex;
            }
            //echo json_encode($thisDatex);
            return response()->json(['data' => $thisDatex, 'day' => $day]);

        }

    }
