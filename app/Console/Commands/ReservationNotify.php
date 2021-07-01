<?php

namespace App\Console\Commands;

use App\Dentist;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReservationNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReservationNotify:reservation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify reservation  successfully ';

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
        $events = DB::table('events')->select('events.id as id','services.service_name_ar','services.service_name_en', 'dentist_id', 'user_id', 'start_time', 'device_id', 'event_date')
        ->join('services', 'events.treatment_id', '=', 'services.id')
        ->where('events.status', 1)
        ->where('event_date', '>=', Carbon::now()->toDateString())->get();

       
        foreach ($events as $event) {
            $dentist = Dentist::find($event->dentist_id);
            $patient = User::find($event->user_id);


            if ($dentist && $patient) {

                $dentist_notify = [
                    'body' => " تذكير اليوم لديك موعد #".$event->id.' لخدمة '.$event->service_name_ar.' الساعة '. date('H:i A',strtotime($event->start_time)),
                    ];
                $dentist_notification = ["message" => $dentist_notify, "event_id" => $event->id];
                $tokenList =array($event->device_id,$dentist->device_id);
                $fcmNotification = [
                    'registration_ids' => $tokenList, //multple token array
                    'notification' => $dentist_notify,
                    'data' => $dentist_notification
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
        }
        $this->info('notify reservation  successfully ');
    }
}
