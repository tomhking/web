<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ExportTranslationsToCsv::class,
        \App\Console\Commands\UpdateIcoBalance::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Start running the command 1 day before ICO and run for extra day after it ends
        $schedule->command('ico:update-balance')->everyMinute()->when(function() {
            $start = Carbon::createFromTimestamp(env('ICO_STARTS_AT'));
            $end = Carbon::createFromTimestamp(env('ICO_ENDS_AT'));

            return $start->subDay()->isPast() && $end->addDay()->isFuture();
        });
    }
}
