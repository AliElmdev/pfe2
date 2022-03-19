<?php

namespace App\Console;

use App\Models\Marche;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    
    protected function schedule(Schedule $schedule){
        $schedule->call(function () {
            $mytime = Carbon::now();
            $time = $mytime->toDateString();
            $marches_dateafficher = Marche::get();
            foreach($marches_dateafficher as $marche){
                if($time >= $marche->affichage_date){
                    $marche->etat = 3;
                    $marche->save();
                }
                if($time >= $marche->limit_date){
                    $marche->etat = 4;
                    $marche->save();
                }
            }
        })->daily();
        // $schedule->command('inspire')->hourly();
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
