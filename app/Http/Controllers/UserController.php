<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\LogIn;
use App\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Updates the progile of a logged in user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function updateProfile(Request $request) {
        $participant = User::getCurrent();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:2|max:35',
            'last_name' => 'required|string|min:2|max:35',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',
        ]);

        if($validator->fails()) {
            return redirect(route('ico-address'));
        }

        $participant->first_name = $request->get('first_name');
        $participant->last_name = $request->get('last_name');
        $participant->country = $request->get('country');
        $participant->birthday = $request->get('birthday');

        $participant->save();

        return redirect(route('ico-address'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function user() {
        if(!auth()->user()->isAirdropParticipant()) {
            return redirect()->route('address');
        }

        return view('pages.user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function address() {
        $ico = config('ico');

        if(!$ico['started']) {
            return redirect()->route('affiliate');
        }

        $currentBonus = false;
        $rate = $ico['rate'];

        foreach($ico['bonuses'] as $item) {
            if(Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                $rate *= $item['bonus'];
                break;
            }
        }

        return view('pages.ico-address', compact('ico', 'currentBonus', 'rate'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function participate() {
        return view('pages.participate');
    }

    function participate2() {
        return view('pages.participate2');
    }

    function participate3() {
        return view('pages.participate3');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function userdetails() {
        return view('pages.userdetails');
    }

    /**
     * @return \Illuminate\View\View
     */
    function affiliate() {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        return view('pages.affiliate', compact('banners'));
    }

    /**
     * Sets affiliate cookie
     *
     * @param $id
     * @return $this
     */
    public function setAffiliateCookie($id)
    {
        return redirect(route_lang('home', ['lang' => 'en']))->withCookie(
            new Cookie('bd-aff', (int) $id > 0 ? (int) $id : 0, Carbon::now()->addMonths(3))
        );
    }
}
