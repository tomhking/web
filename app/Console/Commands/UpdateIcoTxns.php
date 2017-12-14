<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateIcoTxns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:update-txns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves ICO progress and stores the value in cache.';


    private $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = $this->client->get('https://api.etherscan.io/api', [
            'query' => [
                'module' => 'account',
                'action' => 'txlist',
                'address' => env('ICO_ADDRESS'),
                'startblock' => 0,
                'endblock' => '999999999999990',
                'apikey' => env('ETHERSCAN_API_KEY'),
                'sort' => 'asc',
            ],
            'timeout' => 30,
            'http_errors' => false,
        ]);

        $content = $response->getBody()->getContents();

        if ($response->getStatusCode() != 200) {
            $this->line('Could not retrieve the transactions: ' . $content);
            Log::error('Could not retrieve the transactions', [
                'status' => $response->getStatusCode(),
                'body' => $content,
            ]);
            return;
        }

        $response = json_decode($content);

        if(!isset($response->result)){
            $this->line('Etherscan returned results in an unknown format: '.$content);
            Log::error('Etherscan returned results in an unknown format', [
                'body' => $response,
            ]);
            return;
        }

        $txns = collect($response->result)->filter(function($tx) {
            return $tx->isError == 0 && $tx->value != 0;
        })->keyBy('hash');

        $this->line('Transactions updated.');

        cache()->forever('ico-txns', $txns);
    }
}
