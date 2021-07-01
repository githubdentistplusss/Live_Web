<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        "\App\Console\Commands\ReservationNotify",
        "\App\Console\Commands\ReservationConfirm",
        "\App\Console\Commands\UserArrive"
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('ReservationNotify:reservation')
             ->timezone('Asia/Riyadh')
             ->dailyAt('7:00');

        $schedule->command('ReservationConfirm:confirm')
                 ->timezone('Asia/Riyadh')
                 ->everyMinute();

        $schedule->command('user:arrive')
                 ->timezone('Asia/Riyadh')
                 ->everyMinute();
                 
                 
         $url="https://dentistpluss.com/public/score/";
         $ch = curl_init($url);
         
         $schedule->command('user:arrive')
                 ->timezone('Asia/Riyadh')
                 ->everyHour(curl_exec ($ch));

        
        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
