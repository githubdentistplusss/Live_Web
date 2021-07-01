<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Offer;
use Carbon\Carbon;
use DB;
use Auth;
use Session;
class ApiOfferController extends Controller
{
   
		
		 public function index()
        {
            $objects = Offer::get();
           return response()->json(['status'=>'successe','data'=>$objects]);
       

        }
        
        
        public function getcities()
        {
              $cities = DB::table('clinics','cities')->join('cities','cities.id','clinics.city_id')->where('clinic_status',"=","1")->groupby('cities.id')->get();
               return response()->json(['data'=>$cities]);
        }
        
        public function offerNeglect(request $request, $id)
    {
        if ($id) {
           

                DB::table('offer_booking')
                    ->where('offer_booking_id', $id)
                    ->update(['offer_booking_status' => 2]);
                    
                      $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم الغاء الحجز";
            

            return response()->json(['status'=>'successe','message'=>$message]);
            }
    }
    
      public function serviceNeglect(request $request, $id)
    {
        if ($id) {
           

                DB::table('service_booking')
                    ->where('serv_booking_id', $id)
                    ->update(['serv_booking_status' => 2]);
                    
                      $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم الغاء الحجز";
            

            return response()->json(['status'=>'successe','message'=>$message]);
            }
    }
		public function details(Request $request){
			$id=$request->input('offer_id');
            if($id)
            {
                $object=Offer::find($id);
				$photo = explode (",", $object->photo);  
				$title_ar = $object->title_ar;  
				$title_en = $object->title_en;  
				$description_ar = $object->description_ar;  
				$description_en = $object->description_en;  
				$date = $object->date;  
				$link = $object->link;  
				$phone = $object->phone;  
				
           return response()->json(['photo'=>$photo,'title_ar'=>$title_ar,'title_en'=>$title_en,'description_ar'=>$description_ar,'description_en'=>$description_en,'date'=>$date,'link'=>$link,'phone'=>$phone,'status'=>'success']);
            }
		}
            public function getoffers(request $request)
        {
           

            $offers = DB::table('offers')
            ->select("offers.*","category.*","clinics.*")
            ->join('clinics', 'offers.clinic_id', '=', 'clinics.clinic_id')
             ->join('category', 'offers.cat_id', '=', 'category.cat_id')
             
             ->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->inRandomOrder ()
            
             ->get();
             
             $clinics = DB::table('offers')
            ->select("offers.*","category.*","clinics.*")
            ->join('clinics', 'offers.clinic_id', '=', 'clinics.clinic_id')
             ->join('category', 'offers.cat_id', '=', 'category.cat_id')
             
             ->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->inRandomOrder ()
            
             ->groupby('offers.clinic_id')->get();

            if (sizeof($offers) != 0) {
                return response()->json(['count'=>count($offers),'clinics'=>$clinics,'data' => $offers, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
        public function getclinics(request $request)
        {
           

         
             
             $clinics = DB::table('clinics')
            ->select("clinics.*")
            ->inRandomOrder ()
            
            ->groupby('clinics.clinic_name')->get();

            if (sizeof($clinics) != 0) {
                return response()->json(['count'=>count($clinics),'data' => $clinics, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
         public function getoffersbyclinic(request $request , $id )
        {
           
            $offers = DB::table('offers')
            ->select("offers.*","category.*","clinics.*")
            ->join('clinics', 'offers.clinic_id', '=', 'clinics.clinic_id')
             ->join('category', 'offers.cat_id', '=', 'category.cat_id')
             
             ->where('offers.clinic_id',"=",$id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->inRandomOrder ()
            
             ->get();

            if (sizeof($offers) != 0) {
                return response()->json(['count'=>count($offers),'data' => $offers, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
          public function getcategoriesbyclinic(request $request , $id)
        {
           

            $categories = DB::table('offers')
            ->select("offers.*","category.*","clinics.*")
            ->join('clinics', 'offers.clinic_id', '=', 'clinics.clinic_id')
             ->join('category', 'offers.cat_id', '=', 'category.cat_id')
             
             
             ->where('offers.clinic_id',"=",$id)
             
             ->where('cat_status','1')
             
             ->where('offer_status','1')
             
             ->where('offer_end_date','>=',Carbon::now()->toDateString())
           
             
             ->groupby('cat_name','clinics.city_id')->get();
 
                


            if (sizeof($categories) != 0) {
                return response()->json(['data' => $categories, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
        
        
        public function getservicesbyclinic(request $request , $id )
        {
           
            $offers = DB::table('clinic_service')
            ->select("clinic_service.*","private_service.*")
            ->join('private_service', 'clinic_service.clinic_serv_id', '=', 'private_service.private_serv_id')
             
             ->where('clinic_service.clinic_id',"=",$id)->where('clinic_service.clinic_serv_status',"=","1")->where('private_service.private_serv_status','=','1')->inRandomOrder()
            
             ->get();
             
             
               $categories = DB::table('clinic_service')
            ->select("category.*")
            ->join('private_service', 'clinic_service.clinic_serv_id', '=', 'private_service.private_serv_id')
              ->join('category', 'private_service.cat_id', '=', 'category.cat_id')
             ->where('clinic_service.clinic_id',"=",$id)->where('clinic_serv_status',"=","1")->where('private_serv_status','=','1')->inRandomOrder()
            
             ->groupby('cat_name')->get();
             

            if (sizeof($offers) != 0) {
                 return response()->json(['count'=>count($offers),'data' => $offers,'cat' => "test", 'cat' => $categories ,   'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
        
        
        
        
        
        public function getcategories(request $request)
        {
           

            $categories = DB::table('offers')
            ->select("offers.*","category.*","clinics.*")
            ->join('clinics', 'offers.clinic_id', '=', 'clinics.clinic_id')
             ->join('category', 'offers.cat_id', '=', 'category.cat_id')

             ->where('cat_status','1')
           
             
             ->groupby('cat_name','clinics.city_id')->get();
 
                


            if (sizeof($categories) != 0) {
                return response()->json(['data' => $categories, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
        public function bookedoffers(request $request , $user_id)
        {
           
         

            $offers = 
            DB::select(DB::raw("select offer_booking_id, DATE_FORMAT(offer_booking_date,'%a %d %m %Y %h %m %p') as date, clinic_name , offer_booking.created_at as created , offer_photo , offer_title , offer_new_price , clinic_address , clinic_logo , clinic_phone , clinic_map_lat , clinic_map_lang , offer_old_price , offer_booking_status , offer_booking_date from offer_booking join offers join clinics where offer_booking.offer_id=offers.offer_id and offers.clinic_id=clinics.clinic_id and offer_booking.user_id='".$user_id."' order by offer_booking_id desc "));
            
            

           
                
                


            if (sizeof($offers) != 0) {
                return response()->json(['data' => $offers, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
         public function bookedservices(request $request , $user_id)
        {
           
          
            $offers = 
            DB::select(DB::raw("select private_serv_name  , clinic_address, serv_booking_id, DATE_FORMAT(serv_booking_date,'%a %d %m %Y %h %m %p') as date, clinic_name , serv_booking_price , clinic_address , clinic_logo , clinic_phone , clinic_map_lat , clinic_map_lang , serv_booking_status , serv_booking_date from service_booking join private_service join clinics where serv_private_id=private_service.private_serv_id and service_booking.clinic_serv_id=clinics.clinic_id and user_id='".$user_id."' order by serv_booking_id desc"));
            
            




            if (sizeof($offers) != 0) {
                return response()->json(['data' => $offers, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'لا يوجد عروض']);
            }
        }
        
        
        public function bookoffer(request $request)
        {
               
               
            $response = DB::table('offer_booking')->where('offer_id',$request->offer_id)->where('user_id',$request->user_id)->where('offer_booking_status','!=',"2")->count();
           
           if($response==0)
           {
                 $response =  DB::table('offer_booking')->insert(['offer_id' =>$request->offer_id, 'user_id' => $request->user_id,'offer_booking_price' =>$request->offer_booking_price]);
                 
                   $data =  DB::table('offer_booking')->select("offer_booking.*","offers.*","clinics.*")
            ->join('offers', 'offer_booking.offer_id','offers.offer_id')
            ->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offers.offer_id',$request->offer_id)->get();
            
                 
           $DTT_SMS = new \App\Library\Malath_SMS("dentistpluss", "0566@DentistPluss.com", 'UTF-8');

// change message by ahmed alshaikh

$MSG="لديكم حجز جديد علي موقع اسنان بلس بأنتظار الاعتماد dentistpluss.com/clinics";


$mobile=$data[0]->clinic_2nd_phone;
$n = intval(ltrim($mobile, '0')); // integer
            $pfx='966';
            $mobile = $pfx.$n;
            
            
          


$DTT_SMS->Send_SMS($mobile,"DENTISTPLUS",$MSG);
            
                 
           }

           
           
               
                return response()->json(['status' =>$response]);
    
            
        }
            
            
           
              public function bookservice(request $request)
        {
               
               
            $response = DB::table('service_booking')->where('serv_private_id',$request->service_id)->where('user_id',$request->user_id)->where('serv_booking_status','!=',"2")->count();
           
           if($response==0)
           {
                $response =  DB::table('service_booking')->insert(['serv_private_id' =>$request->service_id,'serv_booking_price' =>$request->service_booking_price, 'serv_booking_status' =>"0", 'user_id' => $request->user_id,'clinic_serv_id' =>$request->clinic_id]);
               
                
                 
                 /*  $data =  DB::table('offer_booking')->select("offer_booking.*","offers.*","clinics.*")
            ->join('offers', 'offer_booking.offer_id','offers.offer_id')
            ->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offers.offer_id',$request->offer_id)->get();
            
                 
           $DTT_SMS = new \App\Library\Malath_SMS("dentistpluss", "0566@DentistPluss.com", 'UTF-8');

// change message by ahmed alshaikh

$MSG="لديكم حجز جديد علي موقع اسنان بلس بأنتظار الاعتماد dentistpluss.com/clinics";


$mobile=$data[0]->clinic_2nd_phone;
$n = intval(ltrim($mobile, '0')); // integer
            $pfx='966';
            $mobile = $pfx.$n;
            
            
          


$DTT_SMS->Send_SMS($mobile,"DENTISTPLUS",$MSG);*/
            
                 
           }

               
                return response()->json(['status' =>$response]);
    
            
        }
            
            
            
            
       
        
		

}
