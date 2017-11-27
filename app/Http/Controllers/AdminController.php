<?php

namespace App\Http\Controllers;


use App\Participant;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AdminController
{


    public function stats()
    {
        return response()->json([
            'total' => $totalUsers = Participant::count(),
            'verified' => $verifiedUsers = Participant::where('email_verified', '=', 1)->count(),
            'notVerified' => $totalUsers - $verifiedUsers,
        ], 200, [], JSON_PRETTY_PRINT);
    }

    public function emails()
    {
        $users = Participant::select('email')->where('email_verified', '=', 1)->get();
        return response(implode(PHP_EOL, $users->pluck('email')->toArray()), 200, [
            'content-type' => 'text/csv',
            'content-disposition' => 'attachment; filename=bitdegree-users-verified-' .date('Y-m-d-H-i-s').'.csv;'
        ]);
    }
}