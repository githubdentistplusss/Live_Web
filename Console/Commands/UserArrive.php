<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserArrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:arrive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify arrive user to reservation successfully ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!Schema::hasTable('events')) {
            return false;
        }
        if (!Schema::hasTable('dentists')) {
            return false;
        }

        $date = date('Y-m-d H:i:s');
        $hour_next = date('Y-m-d H:i:s', strtotime($date . ' +1 hours'));

        $data=DB::table('events')
            ->select("events.*", "events.id As event_id", "services.*")
        ->join('services', 'events.treatment_id', '=', 'services.id')
              ->where('events.status', 1)
              ->where('events.event_date', '=', $hour_next)
              ->where('events.start_time', 'like', '%' . date('H:i'). '%')
              ->get();

        if (sizeof($data) != 0) {
            foreach ($data as $event) {
                $event_id =$event->event_id;

                $token=$event->device_id;

                $user_lang = User::find($event->user_id)->language;

                if ($user_lang == 'ar') {
                    $body = 'برجاء التأكيد على الموعد #'.$event_id.' بتاريخ '.$event->event_date.' لخدمة '.$event->service_name_ar.' الساعة '. date('H:i A', strtotime($event->start_time));
                } else {
                    $body = 'Please confirm the appointment #'.$event_id.' with date '.$event->event_date.' for the service '.$event->service_name_en.' at '. date('H:i A', strtotime($event->start_time));
                }
                $notification = [
            'body' => $body ,
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

            $this->info('notify reservation confirmation successfully');

            return response()->json(['count'=>count($data),'data'=>$data,'status'=>'success']);
        } else {
            $this->info('Not found');

            return response()->json(['status'=>'Not found']);
        }
    }
}
