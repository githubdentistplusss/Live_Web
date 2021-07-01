<?php
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

class NotificationController extends Controller
{
    public function getNotification(request $request)
    {
        if (isset($_POST['view'])) {
            if (Auth::guard('dentist')->check()) {
                $dentist_id=Auth::guard('dentist')->user()->id;
                if ($_POST["view"] != '') {
                    DB::table('events')

                        ->where('dentist_id', $dentist_id)

                        ->update(['dentist_notify'=>1]);
                }
                $date=date("Y-m-d");

                $datax=DB::table('events')

            ->select("events.*", "events.id As event_id", "services.*")

            ->join('services', 'events.treatment_id', '=', 'services.id')

            ->where('events.dentist_id', $dentist_id)
            ->orWhereRaw("find_in_set($dentist_id,events.dentist_id)")

           ->where(function ($query) {
               $query->where('events.status', '=', 0);
               $query->orWhere('events.status', '=', 2);
               $query->orWhere('events.status', '=', 4);
           })->orderBy('events.updated_at', 'desc')->limit(15)->get();


                $dentist_id=Auth::guard('dentist')->user()->id;
                $count=DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")

            ->join('services', 'events.treatment_id', '=', 'services.id')

             ->where('events.dentist_notify', "=", 0)
             ->where('events.dentist_id', $dentist_id)
             ->orWhereRaw("find_in_set($dentist_id,events.dentist_id)")

              ->where(function ($query) {
                  $query->where('events.status', '=', 0);
                  $query->orWhere('events.status', '=', 2);
                  $query->orWhere('events.status', '=', 4);
              }) ->count();


                $href="#";
                $msg="";





                //echo json_encode($datax);
                if (sizeof($datax) != 0) {
                    foreach ($datax as $data1) {
                        if ($data1->status==0) {
                            $msg="لديك حجز موعد بإنتظار اعتمادك رقم #".$data1->event_id. ' بتاريخ ' . $data1->event_date. ' لخدمة ' . $data1->service_name_ar . ' الساعة ' . $data1->start_time;
                        } elseif ($data1->status==2) {
                            $msg="لقد تم تاكيد الحضور لموعد #".$data1->event_id. ' بتاريخ ' . $data1->event_date. ' لخدمة ' . $data1->service_name_ar . ' الساعة ' . $data1->start_time;
                        } elseif ($data1->status == 4) {
                            $msg=" يعتذر المراجع ﻹلغاء الموعد #".$data1->event_id. ' بتاريخ ' . $data1->event_date. ' لخدمة ' . $data1->service_name_ar . ' الساعة ' . $data1->start_time;
                        }

                        if ($data1->dentist_notify == 0) {
                            $output[] = ' <li style="padding:15px;border-bottom:1px solid #E1E5F2;background-color:#e8e8e8">
                    <a href="'.url('/Ddetails/'.$data1->event_id).'">

                    <small><em>'.$msg.'</em></small>
                    </a>
                    </li>';
                        } else {
                            $output[] = ' <li style="padding:15px;border-bottom:1px solid #E1E5F2;">
                    <a href="'.url('/Ddetails/'.$data1->event_id).'">

                    <small><em>'.$msg.'</em></small>
                    </a>
                    </li>';
                        }
                    }

                    $output[]= '
<li class="text-center"><a href="'.url('/dnotifications').'" >مشاهدة الكل</a></li>';
                } else {
                    $output[]= '
     <li class="text-center">لا يوجد اشعارات</li>
     <li class="text-center"><a href="'.url('/dnotifications').'" >مشاهدة الكل</a></li>';
                }
                $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);
                echo json_encode($data);
            } elseif (Auth::guard('client')->check()) {
                $user_id=Auth::guard('client')->user()->id;

                if ($_POST["view"] != '') {
                    DB::table('events')

                            ->where('user_id', $user_id)

                            ->update(['user_notify'=>1]);
                }

                $date=date("Y-m-d");

                $datax=DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")

            ->join('services', 'events.treatment_id', '=', 'services.id')
              ->where('events.user_id', $user_id)
              ->where(function ($query) {
                  $query->where('events.status', '=', 1);
                  $query->orWhere('events.status', '=', 3);
                  $query->orWhere('events.status', '=', 5);
              })->orderBy('events.updated_at', 'desc')->limit(15)->get();

                $user_id=Auth::guard('client')->user()->id;
                $count=DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")

            ->join('services', 'events.treatment_id', '=', 'services.id')
              ->where('events.user_id', $user_id)
              ->where('events.user_notify', "=", 0)
               ->where(function ($query) {
                   $query->where('events.status', '=', 1);
                   $query->orWhere('events.status', '=', 3);
                   $query->orWhere('events.status', '=', 5);
               })
              ->count();
                $href="#";
                $msg="";
                // $output=array();
                if (sizeof($datax) != 0) {
                    foreach ($datax as $data1) {
                        if ($data1->status==1) {
                            $msg="لقد تم اعتماد موعدك #".$data1->event_id. ' بتاريخ ' . $data1->event_date . ' لخدمة ' . $data1->service_name_ar . ' الساعة ' . $data1->start_time;
                        } elseif ($data1->status==3) {
                            $msg=" نعتذر لعدم إعتماد موعدك بإمكانك حجز موعد أخر #".$data1->event_id . ' لخدمة ' . $data1->service_name_ar . ' الساعة ' . $data1->start_time .' بإمكانك حجز موعد اخر ';
                        } elseif ($data1->status==5) {
                            $msg="لقد تم تسجيل وصولك لموعد #".$data1->event_id;
                        }

                        if ($data1->user_notify == 0) {
                            $output[] = ' <li style="padding:15px;border-bottom:1px solid #E1E5F2;background-color:#e8e8e8">
                    <a href="'.url('/details/'.$data1->event_id).'">

                    <small><em>'.$msg.'</em></small>
                    </a>
                    </li>';
                        } else {
                            $output[] = ' <li style="padding:15px;border-bottom:1px solid #E1E5F2;">
                    <a href="'.url('/details/'.$data1->event_id).'">

                    <small><em>'.$msg.'</em></small>
                    </a>
                    </li>';
                        }
                    }
                    $output[]= '
<li class="text-center"><a href="'.url('/cnotifications').'">مشاهدة الكل</a></li>';
                } else {
                    $output[]= '
     <li class="text-center">لا يوجد اشعارات</li>
     <li class="text-center"><a href="'.url('/cnotifications').'" >مشاهدة الكل</a></li>';
                }
                $data = array(
    'notification' => $output,
    'unseen_notification'  => $count
);
                echo json_encode($data);
            }
        }
    }

    public function NotificationForUserTOArrive(request $request)
    {
        $date = date('Y-m-d');
        $day_next = date('Y-m-d', strtotime($date . ' +1 day'));

        $data=DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")
            ->join('services', 'events.treatment_id', '=', 'services.id')
              ->where('events.status', 1)
              ->where('events.event_date', '=', $day_next)
              ->get();

        if (sizeof($data) != 0) {
            foreach ($data as $event) {
                $event_id =$event->event_id;

                $token=$event->device_id;
                $user_lang = User::find($event->user_id)->language;

                if ($user_lang == 'ar') {
                    $body = 'برجاء التأكيد على الموعد #'.$event_id.' بتاريخ '.$event->event_date.' لخدمة '.$event->service_name_ar.' الساعة '. date('H:i A', strtotime($event->start_time));
                } else {
                    $body =  'Please confirm the appointment #'.$event_id.' with date '.$event->event_date.' for the service '.$event->service_name_en.' at '. date('H:i A', strtotime($event->start_time));
                }

                $notification = [
        'body' => $body,
        'sound' => 'default',

        ];
                $extraNotificationData = ["message" => $notification,"event_id" =>$event_id];

                $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
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
                curl_exec($ch);
                curl_close($ch);
            }

            return response()->json(['count'=>count($data),'data'=>$data,'status'=>'success']);
        } else {
            return response()->json(['status'=>'Not found']);
        }
    }


    public function NotificationByDentist()
    {
        $dentist_id = Auth::guard('dentist')->user()->id;

        $checkevent=DB::table('user_notifications')
            ->select("user_notifications.*", "user_notifications.id As notification_id", "events.*")
            ->join('events', 'user_notifications.event_id', '=', 'events.id')
              ->where('user_notifications.dentist_id', $dentist_id)
              ->get();
        $searchString = ',';
        foreach ($checkevent as $i) {
            if (strpos($i->dentist_id, $searchString) == false) {
                if ($i->dentist_id !=$dentist_id) {
                    User_notification::where('event_id', $i->id)
         ->where('dentist_id', $dentist_id)->delete();
                }
            }
        }


        $notifications =DB::table('user_notifications')
            ->select("user_notifications.*", "user_notifications.id As notification_id", "services.*", "events.*")
            ->join('events', 'user_notifications.event_id', '=', 'events.id')
            ->join('services', 'user_notifications.service_id', '=', 'services.id')
              ->where('user_notifications.dentist_id', $dentist_id)
              ->orderBy('user_notifications.id', 'desc')
              ->paginate(15);

        return view('vendor.notifications', compact('notifications'));
    }

    public function NotificationByUser()
    {
        $user_id = Auth::guard('client')->user()->id;

        $notifications=DB::table('user_notifications')
            ->select("user_notifications.*", "user_notifications.id As notification_id", "services.*", "events.*")
            ->join('events', 'user_notifications.event_id', '=', 'events.id')
            ->join('services', 'user_notifications.service_id', '=', 'services.id')
              ->where('user_notifications.user_id', $user_id)
              ->orderBy('user_notifications.id', 'desc')
              ->paginate(15);

        return view('frontend.client.notifications', compact('notifications'));
    }
}
