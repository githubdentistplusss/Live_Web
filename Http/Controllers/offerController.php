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

class offerController extends Controller
{

    public function demoffers()
    {
       // $i = rand(1, 2);
       // $i==1? $sort ="DESC" : $sort="ASC"; 
       $sort ="DESC" ;
       $this->data['category'] = DB::table('category')->join('offers','offers.cat_id','category.cat_id')->orderby('cat_type','asc')->groupby('category.cat_id')->get();
       
       $this->data['offers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('cat_type','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
       
        $this->data['alloffers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
       
       $this->data['otheroffers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('cat_type','=','2')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
         $this->data['cities'] = DB::table('offers','clinics','cities')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('cities','cities.id','clinics.city_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_view', $sort)->groupby('cities.id')->get();
        
        return view('views.demo-offers', $this->data);

    }
    
    public function search_offers(Request $request)
{
if($request->ajax())
{
$output="";
$offers=DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('cat_type','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->where('offer_title','LIKE','%'.$request->search."%")->get();
if($offers)
{
foreach ($offers as $key => $offer) {
 ob_start(); ?>

	<div data-type="<?php echo $offer->cat_type ?>" data-maincat="<?php echo $offer->cat_id ?>" data-category="<?php echo $offer->city_id ?>" class="col-md-12 col-lg-3 col-xl-3 product-custom">
									<div class="profile-widget" data-price="<?php echo $offer->offer_new_price ?>" style="width: 100%; display: inline-block;">
									
									<div class="doc-img">
										<a href="<?php echo  Route('offerdetails',$offer->offer_id) ?>" tabindex="0">
											<img  class="img-fluid" alt="User Image" src="images/<?php echo $offer->offer_photo ?>">
										</a>
										 <div style="width:60px;height:30px;background-color:red;position:absolute;color:white;font-size:20px;top:0px">
											        
											       <center> <?php echo 100-round(($offer->offer_new_price/$offer->offer_old_price*100),0) ?> % </center>
											       
											    </div>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="<?php echo Route('offerdetails',$offer->offer_id) ?>" tabindex="0"><?php echo $offer->offer_title ?></a> 
											<i style="display:none" class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality"><?php echo $offer->offer_sub_title ?></p>
									
										<ul class="available-info">
											<li>
												<i class="far fa-money-bill-alt"></i> <span style="font-size:20px;color:red;"> <?php echo $offer->offer_new_price ?> </span><del><?php echo $offer->offer_old_price?></del>ريال
											
											</li>
										</ul>
										<a href="<?php echo Route('clinic',$offer->clinic_name) ?>">
										<div > 
									    	<div class="avatar avatar-lg">
												<img class="avatar-img rounded-circle"  alt="<?php echo $offer->clinic_name ?>" src="images/<?php echo $offer->clinic_logo ?>">
											</div>
									    	<div class="avatar" style="width: 10rem;white-space:nowrap;">
									    	   	<ul class="available-info">
									    	   	    <li>
									    	   	        <b>  <?php echo $offer->clinic_name ?></b>
									    	   	    </li>
        											<li>
            												<i class="fas fa-map-marker-alt"></i><?php echo $offer->clinic_address?>
        											</li>
        										</ul>
											</div>

										</div>
										</a>
										<div class="row row-sm">
											<div class="col-6">
												<a href="<?php echo  Route('offerdetails',$offer->offer_id) ?>" class="btn view-btn" tabindex="0">عرض التفاصيل</a>
											</div>
											
											<form   action="<?php echo url('bookoffer') ?>" method="post">
											  
                                              <input type="text" value="<?php echo $offer->offer_id ?>" name="offer_id" hidden />
                                             
                                               <input type="text" value="<?php echo $offer->offer_new_price ?>" name="offer_booking_price" hidden />
                                               
                                                <input type="text" value="-1" name="user_id" hidden />
                                              
                                             
                                              <div class="col-6">
											
									                
													<a href="<?php echo Route('offerdetails',$offer->offer_id) ?>" class="btn book-btn" tabindex="0"> حجز الان </a>

<!--												
													 <input class="btn book-btn" onclick="" value="احجز الان" type="submit" >
										-->
											</div>
                                               
                                                 </form>
                                      
											
											
										</div>
									</div>
								</div>
							   </div>

<?php $output = $output . ob_get_clean(); 
}
return Response($output);
   }
   }
}

    
    public function index()
    {
       // $i = rand(1, 2);
       // $i==1? $sort ="DESC" : $sort="ASC"; 
       $sort ="DESC" ;
       $this->data['category'] = DB::table('category')->join('offers','offers.cat_id','category.cat_id')->where('offer_status' , '=',  "1")->where('offer_end_date', '>' ,'2021-06-23')->orderby('cat_type','asc')->groupby('category.cat_id')->get();
       
       $this->data['offers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('cat_type','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
       
        $this->data['alloffers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
       
       $this->data['otheroffers'] = DB::table('offers','clinics','category')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','category.cat_id','offers.cat_id')->where('cat_type','=','2')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_score', $sort)->paginate(30);
       
         $this->data['cities'] = DB::table('offers','clinics','cities')->join('clinics','offers.clinic_id','clinics.clinic_id')->join('cities','cities.id','clinics.city_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->orderBy('offer_view', $sort)->groupby('cities.id')->get();
        
        return view('views.offers', $this->data);

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
    
       
       public function offerbookdetails(request $request)
       {
           $id=$request->id;
       	
       	
            if($id)
            {
              $this->data['offers'] = DB::table('offer_booking','offers','clinics')->join('offers','offer_booking.offer_id','offers.offer_id')->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offer_booking_id',$id)->get();
              

               return view('views.client.offer-book-details', $this->data);
            }
           
            
           
       }
       
       public function offerNeglect(request $request, $id)
    {
        if ($id) {
           

                DB::table('offer_booking')
                    ->where('offer_booking_id', $id)
                    ->update(['offer_booking_status' => 2]);
                    
                      $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم الغاء الموعد من قبل المراجع";
            Session::flash("message", $message);

            return redirect('bookedoffers%7D');
            }
           

          /*  $event = DB::table('events')
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
            // $token = $event[0]->device_id;
            // $user_lang = User::find($event[0]->user_id)->language;

            if ($dentist->language == 'ar') {
                $body = ' يعتذر المراجع ﻹلغاء الموعد #.' . $id . ' بتاريخ ' . $event[0]->event_date . ' لخدمة ' . $event[0]->service_name_ar . ' الساعة ' . date('H:i A', strtotime($event[0]->start_time));
            } else {
                $body = ' The patient apologizes for canceling the appointment #.' . $id . ' with date ' . $event[0]->event_date . ' for the service ' . $event[0]->service_name_en . ' at ' . date('H:i A', strtotime($event[0]->start_time));
            }

            $notification = [
                'body' => $body, 'sound' => 'default',

            ];
            $extraNotificationData = ["message" => $notification, "event_id" => $id];

            $fcmNotification = [
                'registration_ids' => $tokenList, //multple token array
                //  'to' => $token, //single token
                'notification' => $notification,
                'data' => $extraNotificationData,
            ];

            $headers = [
                'Authorization: key=' . env('FCM_API_ACCESS_KEY'),
                'Content-Type: application/json',
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, env('FCM_URL'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
            $result = curl_exec($ch);
            curl_close($ch);*/

          
        
    }
    
       public function bookoffer(request $request)
       {
          
           $response = DB::table('offer_booking')->where('offer_id',$request->offer_id)->where('user_id',$request->user_id)->where('offer_booking_status','!=',"2")->count();
                  
           if(isset(Auth::guard('client')->user()->id))
           {
                 if($response==0)
                 {
                     
                 
            $response =  DB::table('offer_booking')->insert(['offer_id' =>$request->offer_id, 'user_id' => Auth::guard('client')->user()->id,'offer_booking_price' =>$request->offer_booking_price]);

                  $message = (app()->getLocale() == 'en') ? "Cancellation has been confirmed successfully" : "تم حجز العرض";
            Session::flash("message", $message);
            
             $id = DB::getPdo()->lastInsertId();
            
            $data =  DB::table('offer_booking')->select("offer_booking.*","offers.*","clinics.*")
            ->join('offers', 'offer_booking.offer_id','offers.offer_id')
            ->join('clinics','offers.clinic_id','clinics.clinic_id')->where('offers.offer_id',$request->offer_id)->get();
            
            
          
              
              
           $DTT_SMS = new \App\Library\Malath_SMS("dentistpluss", "0566@DentistPluss.com", 'UTF-8');


  $MSG="لديكم حجز جديد علي موقع اسنان بلس بأنتظار الاعتماد dentistplus.com/clinics";

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
   
           }
           else
           {
              return redirect('/offerdetails/'. $request->offer_id);
           }
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
       
       public function offerdetails(request $request)
       {
          //  print_r($request);
     
         	$id=$request->id;
         	
         	

            if (isset($_POST['btn_rigester']))
            {

                $user_check = User::where('mobile', $request->mobile)
                ->where('active', 0)->first();
                if ($user_check) {
                    User::where('mobile', $request->mobile)
                        ->where('active', 0)->first()->delete();
                }
                $this->validate(
                    $request,
                    [
                        'name' => 'required|string|max:255',
                        'mobile' => 'required|numeric|regex:/(05)[0-9]{8}/|unique:users',
                        'password' => 'required|string|min:6|confirmed',
                    ]
                );
                if ($request->password === $request->password_confirmation)
                {

                    $result = '';
                    for ($i = 0; $i < 4; $i++) {
                        $result .= mt_rand(0, 9);
                    } 
                    
                       $client = User::create([
                                'name' => $request->name,
                                'mobile' => $request->mobile,
                                'admin' => 2,
                                'otp' => $result,
                                'password' => bcrypt($request->password),
                                'api_token' => Str::random(60),
                                     ]);

                    if ($client) {
                            Auth::guard('client')->login($client);
                           // return redirect('/clientDashboard');
                           $offer_booked = (app()->getLocale() == 'en') ? "Offer Booked " : "لقد تم حجز العرض بنجاح";
                           Session::flash('offer_booked',$offer_booked );

                           self::doBooking( $id);
                    } else {
                        $error_message = (app()->getLocale() == 'en') ? "Failed send " : "حدث خطأ أثناء التسجيل. برجاء المحاولة مرة أخرى";
                        Session::flash('message', $error_message);
                       // return redirect()->back();
                    }
                }
                else
                {
                    $error_message = (app()->getLocale() == 'en') ? "Password and password confirmation do not match " : "كلمة والمرور وتأكيد كلمة المرور غير متطابقان";
                    Session::flash('message', $error_message);
                    
                  //  return redirect()->back();
                }
                
            }
       	
       	
            if($id)
            {
              $this->data['offers'] = DB::table('offers','clinics',"services")->join('clinics','offers.clinic_id','clinics.clinic_id')->join('category','offers.cat_id','category.cat_id')->where('offers.offer_id',$id)->get();
               DB::table('offers')->where('offer_id',$id)->update(['offer_view' => \DB::raw('offer_view + 1')]);
             $this->data['booking'] ='';
            if(isset(Auth::guard('client')->user()->id))
            {
                 $this->data['booking'] = DB::table('offer_booking')->where('offer_id',$id)->where('user_id', Auth::guard('client')->user()->id)->get();
            }

              //$this->data['hrs'] = DB::table('offers','clinics',"services")->join('clinics','offers.clinic_id','clinics.clinic_id')->join('clinic_business_hours','clinics.clinic_id','clinic_business_hours.clinic_id')->where('offers.offer_id',$id)->get();
              
            $this->data['rec_offers'] = DB::table('offers','clinics')->join('clinics','offers.clinic_id','clinics.clinic_id')->where('clinic_status',"=","1")->where('offer_status','=','1')->where('offer_end_date','>',Carbon::now()->toDateString())->limit(10)->inRandomOrder()->get();

               return view('views.offer-details',$this->data);
            }
       }
       
       public function bookedoffers(request $request )
       {
            if(isset(Auth::guard('client')->user()->id))
           {
           
            $this->data['offers'] = DB::table('offer_booking')
            ->select("offer_booking.*","offers.*","clinics.*")
            ->join('offers', 'offer_booking.offer_id','offers.offer_id')
            ->join('clinics','offers.clinic_id','clinics.clinic_id')
            ->where('offer_booking.user_id', Auth::guard('client')->user()->id)->orderBy('offer_booking_id','desc')
            ->get();
            
             return view('views.client.bookedoffers',$this->data);
           }
           else
           {
                return redirect('cLogin');
           }
            
       }
    
}
