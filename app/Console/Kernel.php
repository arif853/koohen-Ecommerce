<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:update-campaign-status')->everyMinute();
        $schedule->command('camp:campaign-status-update')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load([
            __DIR__.'/Commands',
            __DIR__.'/Commands/UpdateCampaignStatus.php',
            __DIR__.'/Commands/CampaingStatusUpdate.php',
        ]);

        require base_path('routes/console.php');
    }

}
