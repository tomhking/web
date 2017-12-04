<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

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
}