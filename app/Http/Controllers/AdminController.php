<?php

namespace App\Http\Controllers;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController
{

    public function stats()
    {
        return response()->json([
            'total' => $totalUsers = User::count(),
            'verified' => $verifiedUsers = User::where('email_verified', '=', 1)->count(),
            'notVerified' => $totalUsers - $verifiedUsers,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function emails(Request $request)
    {
        $whitelist = explode(',', env('WHITELISTED_USERS', ''));

        if(!auth()->check() || !in_array(auth()->id(), $whitelist)) {
            abort(404);
        }

        $users = User::select('email')->where('email_verified', '=', 1)->get();
        return response(implode(PHP_EOL, $users->pluck('email')->toArray()), 200, [
            'content-type' => 'text/csv',
            'content-disposition' => 'attachment; filename=bitdegree-users-verified-' .date('Y-m-d-H-i-s').'.csv;'
        ]);
    }

    public function txns(Request $request)
    {
        $key = env('STATS_KEY', null);
        if(empty($key) || $key != $request->get('key')) {
            abort(404);
        }

        $txns = cache()->get('ico-txns');

        if (empty($txns)) {
            abort(404, 'Transactions unavailable.');
        }

        $txns = $txns->map(function ($tx) {
            $tx->from = strtolower($tx->from);
            return $tx;
        });

        $users = User::withWallet()->orderBy('wallet_updated_at', 'desc')->distinct('wallet')->get()->map(function ($user) {
            $user->wallet = strtolower($user->wallet);
            return $user;
        })->keyBy('wallet');

        // ETH raised
        $raisedEth = '0';
        foreach($txns as $tx) $raisedEth = bcadd($raisedEth, $tx->value);
        $raisedEth = bcdiv($raisedEth, bcpow(10,14)) / pow(10,4);

        // TXs by day
        $txnsByDay = $txns->groupBy(function ($tx) {
            return date('Y-m-d', $tx->timeStamp);
        })->reverse();

        // By country
        $hasDate = $request->has('date') && $txnsByDay->has($request->get('date'));
        $date = $request->get('date');
        $filteredTxns = $hasDate ? $txnsByDay->get($request->get('date')) : $txns;
        foreach($filteredTxns as &$tx) {
            $tx->country = $users->has($tx->from) ? $users->get($tx->from)->country ?? 'UNKNOWN' : 'UNKNOWN';
            $tx->user = $users->get($tx->from, null);
        }
        $countryTxns = $filteredTxns->groupBy('country')->sortByDesc(function ($txns) {
            return $txns->sum('value');
        });

        $holders = $filteredTxns->groupBy('from')->sortByDesc(function ($txns) {
            return $txns->sum('value');
        });

        // Affiliate
        /*$referrals = User::withWallet()->whereNotNull('affiliate_id')->get()->groupBy('affiliate_id')->map(function($users) use ($txns) {
            $users = $users->map(function ($user) use ($txns) {
                $user->contributed = $user->wallet ? $txns->where('from', '=', $user->wallet)->sum('value'): 0;
                $user->contributed_after = $user->wallet && $user->wallet_updated_at instanceof Carbon ? $txns->where('from', '=', $user->wallet)->where('timestamp','>', $user->wallet_updated_at->timestamp)->sum('value'): 0;
                return $user;
            });
            return [
                'affiliate' => null,
                'users' => $users,
                'contributed' => $users->sum('contributed'),
                'contributed_after' => $contribution = $users->sum('contributed_after'),
                'estimated_commission' => $contribution * 0.05 * 10000,
            ];
        })->sortByDesc(function($referral) {
            return $referral['contributed_after'];
        })->slice(0,10);

        $users = User::whereIn('id', $referrals->keys())->get()->each(function($affiliate) use ($referrals) {
            $referralData = $referrals->get($affiliate->id);
            $referralData['affiliate'] = $affiliate;
            $referrals->put($affiliate->id, $referralData);
        });*/

        return view('pages.statistics', compact('raisedEth',  'txns', 'txnsByDay', 'countryTxns', 'filteredTxns', 'hasDate', 'date', 'holders', 'users', 'key', 'referrals'));
    }
}