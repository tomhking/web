<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UpdateIcoBalance extends Command
{

    protected $signature = 'ico:update-balance';
    protected $description = 'Retrieves ICO wallet balance and stores the value in cache.';

    private $client;
    private $icoWalletAddress;

    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
        $this->icoWalletAddress = env('ICO_WALLET_ADDRESS');
    }

    public function handle()
    {
        $balanceBefore = Cache::get('ico_balance');

        if (empty($this->icoWalletAddress)) {
            $this->line('ICO address is not set.');
            return;
        }

        $response = $this->client->get('https://api.etherscan.io/api', [
            'query' => [
                'module' => 'account',
                'action' => 'balance',
                'address' => $this->icoWalletAddress,
                'tag' => 'latest',
                'apikey' => env('ETHERSCAN_API_KEY'),
            ],
            'timeout' => 30,
            'http_errors' => false,
        ]);

        $content = $response->getBody()->getContents();

        if ($response->getStatusCode() != 200) {
            $this->line('Could not retrieve the ICO balance: ' . $content);
            Log::error('Could not retrieve ICO balance', [
                'status' => $response->getStatusCode(),
                'body' => $content,
            ]);
            return;
        }

        $balance = json_decode($content);

        if(!isset($balance->result)){
            $this->line('Etherscan returned results in an unknown format: '.$content);
            Log::error('Etherscan returned results in an unknown format', [
                'body' => $balance,
            ]);
            return;
        }

        Cache::forever('ico_balance', [
            'time' => Carbon::now(),
            'balance' => $balance->result,
        ]);

        $this->line('Done! Balance of '.$this->icoWalletAddress.' is '.$balance->result.'. Difference: '.bcsub($balance->result, $balanceBefore['balance'] ?? 0));
    }
}