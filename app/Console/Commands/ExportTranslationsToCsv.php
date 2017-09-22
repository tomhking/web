<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExportTranslationsToCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:export {lang?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Takes all translations and exports them as CSV';

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
     * @return void
     */
    public function handle()
    {
        $language = $this->argument("lang") ?? 'en';
        $path = resource_path('lang/' . $language . '/');

        $messages = [];

        foreach (scandir($path) as $file) {
            if (substr($file, -4) != '.php') {
                continue;
            }

            $messages[substr($file, 0, -4)] = require($path . $file);
        }

        foreach(array_dot($messages) as $key => $message) {
            if(!is_string($message)){
                continue;
            }
            $out = fopen('php://output', 'w');
            fputcsv($out, [$key, $message]);
            fclose($out);
        }
    }
}
