<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
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

        $affiliates = User::withWallet()->whereNotNull('affiliate_id')->get()->groupBy('affiliate_id')->map(function($users, $affiliateId) use ($txns) {
            $contributed = 0;
            $contributedAfter = 0;

            $users = $users->map(function ($user) use ($txns, &$contributed, &$contributedAfter) {
                $userTxns = $txns->where('from', '=', $user->wallet);
                $user->contributed = $user->wallet ? $userTxns->sum('value'): 0;
                $user->contributed_after = $user->wallet && $user->wallet_updated_at instanceof Carbon ? $userTxns->where('timeStamp','>', $user->wallet_updated_at->timestamp)->sum('value'): 0;
                $contributed = bcadd($contributed, $user->contributed);
                $contributedAfter = bcadd($contributedAfter, $user->contributed_after);
                return $user;
            });

            $this->line("Iterating through affiliate ".$affiliateId." (".$users->count()." referrals)");

            return [
                'affiliate' => null,
                'users' => $users,
                'contributed' => $contributed,
                'contributed_after' => $contributedAfter,
                'estimated_commission' => $contributedAfter * 0.05 * 10000,
            ];
        })->sort(function($a, $b) {
            if($b['contributed_after'] > 0 || $a['contributed_after'] > 0) {
                return bccomp($b['contributed_after'],$a['contributed_after']);
            }
            return bccomp($b['contributed'],$a['contributed']);
        })->slice(0,10);

        User::whereIn('id', $affiliates->keys())->get()->each(function($affiliate) use ($affiliates) {
            $referralData = $affiliates->get($affiliate->id);
            $referralData['affiliate'] = $affiliate;
            $affiliates->put($affiliate->id, $referralData);
        });


        $this->line('Affiliates updated.');

        cache()->forever('ico-affiliates', $affiliates);
    }
}
