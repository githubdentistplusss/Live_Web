<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Validator;
use Input;
use App\Nationality;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use Session;

class ClinicController extends Controller
{

    public function index(request $request)
    {
    
       $sort ="DESC" ;
       

       
       $this->data['category'] = DB::table('category')->join('offers','offers.cat_id','category.cat_id')->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offer_status','=','1')->where('clinics.clinic_id','=',$request->id)->orderby('cat_type','asc')->groupby('category.cat_id',"cat_type")->get();
       
        $this->data['offers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinics.clinic_id','=',$request->id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
      
       $this->data['services'] = DB::table('clinic_service')
            ->select("clinic_service.*","private_service.*")
            ->join('private_service', 'clinic_service.clinic_serv_id', '=', 'private_service.private_serv_id')
            ->join('clinics', 'clinic_service.clinic_id', '=', 'clinics.clinic_id')
             
             ->where('clinics.clinic_id',"=",$request->id)->where('clinic_service.clinic_serv_status',"=","1")->where('private_service.private_serv_status','=','1')->inRandomOrder()
            
             ->get();
             
             
                $this->data['servcategory'] = DB::table('clinic_service')
            ->select("category.*")
            ->join('private_service', 'clinic_service.clinic_serv_id', '=', 'private_service.private_serv_id')
            ->join('clinics', 'clinic_service.clinic_id', '=', 'clinics.clinic_id')
              ->join('category', 'private_service.cat_id', '=', 'category.cat_id')
             ->where('clinics.clinic_id',"=",$request->id)->where('clinic_serv_status',"=","1")->where('private_serv_status','=','1')->inRandomOrder()
            
             ->groupby('cat_name')->get();
             
             
             $this->data['clinic'] = DB::table('clinics')->where('clinic_id','=',$request->id)->get();
         
        
        return view('views.clinic', $this->data);

    }
    
     public function allclinics()
    {
          $this->data['clinic'] = DB::table('clinics')->where('clinic_status',"=","1")->get();
          
           $this->data['cities'] = DB::table('clinics',"cities")->join('cities','cities.id','clinics.city_id')->where('clinic_status',"=","1")->groupby('city_id')->get();
        
        return view('views.allclinics', $this->data);
    }
    
     public function catoffers($id)
    {
       
      
       
       $this->data['offers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('offers.cat_id',$id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->get();
        
      DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('offers.cat_id',$id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->update(['offer_view' => \DB::raw('offer_view + 1')]);
        
        return view('views.catoffers', $this->data);

    }
    
    
     public function sortoffers($id)
    {
       
      
       
       $this->data['offers'] = DB::table('offers','clinics','category','cities')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->join('cities','cities.id','clinics.city_id')->where('cities.city_name_ar',$id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->get();
        
      DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('offers.cat_id',$id)->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->update(['offer_view' => \DB::raw('offer_view + 1')]);
        
        return view('views.sortoffers', $this->data);

    }
    
       
        public function bookedservices(request $request)
        {
           
               if(isset(Auth::guard('client')->user()->id))
           {
           
          
            $this->data['services']=
            DB::select(DB::raw("select private_serv_name  , clinic_address, serv_booking_id, DATE_FORMAT(serv_booking_date,'%a %d %m %Y %h %m %p') as date, clinic_name , serv_booking_price , clinic_address , clinic_logo , clinic_phone , clinic_map_lat , clinic_map_lang , serv_booking_status , serv_booking_date from service_booking join private_service join clinics where serv_private_id=private_service.private_serv_id and service_booking.clinic_serv_id=clinics.clinic_id and user_id='".Auth::guard('client')->user()->id."' order by serv_booking_id desc"));
            
            




            return view('views.client.bookedservices',$this->data);
           }
           else
           {
                return redirect('cLogin');
           }
        }
        
          public function serviceNeglect(request $request, $id)
    {
        if ($id) {
           

                DB::table('service_booking')
                    ->where('serv_booking_id', $id)
                    ->update(['serv_booking_status' => 2]);
                    
                      $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم الغاء الموعد من قبل المستخدم";
            Session::flash("message", $message);

            return redirect('bookedservices');
            }
       
    }
    
       public function bookservice(request $request , $id , $service)
       {
          
     
           if(isset(Auth::guard('client')->user()->id))
           {
               
               $data= DB::table('clinic_service')
            ->select("clinic_service.*")
           
             ->where('private_serv_id',"=",$service)->where('clinic_id',"=",$id)->where('clinic_serv_status',"=","1")->get();
             
             
            
              
       
                       
                 
            $response =  DB::table('service_booking')->insert(['serv_private_id' =>$service,'serv_booking_price' =>$data[0]->clinic_serv_price, 'serv_booking_status' =>"0", 'user_id' => Auth::guard('client')->user()->id,'clinic_serv_id' =>$id]);

                  $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم حجز العرض";
            Session::flash("message", $message);
            
             return redirect('/serviceNeglect/'. $service);
            
           }
           else
           {
              return redirect('cLogin');
           }
            
          
            
            
          
           /*   
              
           $DTT_SMS = new \App\Library\Malath_SMS("dentistpluss", "0566@DentistPluss.com", 'UTF-8');



$MSG="لديكم حجز جديد علي موقع اسنان بلس بأنتظار الاعتماد dentistpluss.com/clinics";


$mobile=$data[0]->clinic_2nd_phone;
$n = intval(ltrim($mobile, '0')); // integer
            $pfx='966';
            $mobile = $pfx.$n;
            
            
          


$DTT_SMS->Send_SMS($mobile,"DENTISTPLUS",$MSG);
            
          
            
            $message = (app()->getLocale() == 'en') ? "Confirmed successfully" : "تم حجز العرض";
            Session::flash("message", $message);
            

                 return redirect('/offerdetails/'. $request->offer_id);
   
           }
           else
           {
              return redirect('/offerdetails/'. $request->offer_id);
           }
           
           */
           
       }
           
       public function doBooking( $offer_id)
       {
          
                  
           if(isset(Auth::guard('client')->user()->id))
           {
                 
            $response =  DB::table('offer_booking')->insert(['offer_id' =>$offer_id, 'user_id' => Auth::guard('client')->user()->id,'offer_booking_price' =>intval($_POST['offer_new_price'])]);

                  $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم حجز العرض";
            Session::flash("message", $message);
            
             $id = DB::getPdo()->lastInsertId();
            
            $data =  DB::table('offer_booking')->select("offer_booking.*","offers.*","clinics.*")
            ->join('offers', 'offer_booking.offer_id','offers.offer_id')
            ->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offers.offer_id',$offer_id)->get();
            
            
            $msgs="لديكم&nbsp;حجز&nbsp;جديد&nbsp;علي&nbsp;موقع&nbsp;اسنان&nbsp;بلس&nbsp;بأنتظار&nbsp;الاعتماد&nbsp;dentistpluss.com/clinics";
              
              
            
            $number =  $data[0]->clinic_2nd_phone;
            $n = intval(ltrim($number, '0')); // integer
            $pfx='966';
            $number = $pfx.$n;
            
            $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم حجز العرض";
            Session::flash("message", $message);
            
              $url="https://sms.malath.net.sa/httpSmsProvider.aspx?username=dentistpluss&password=0566@DentistPluss.com&mobile=$number&unicode=none&message=$msgs&sender=DENTISTPLUS";
            
                            
                           
                $header=array();            
                $header[]="Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
                $header[]="Accept-Encoding: gzip, deflate";
                $header[]="Accept-Language: en-US,en;q=0.5";
                $header[]="Connection: keep-alive";
                
                
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.8.1.7) Gecko/20070914 Firefox/2.0.0.7');
                curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_ENCODING , "gzip");
                $x = curl_exec($ch);
                
            
           //return redirect('bookedoffers%7D');
                // return redirect('/offerdetails/'. $request->offer_id);
                return 1;
           }
           else
           {
                return 0;    
           }
       }
       
    
    
    
}