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
     * @param $lang
     * @param $participant
     * @param $token
     * @param string $destination
     * @return $this|\Illuminate\View\View
     */
    function auth($participant, $token, $destination = '') {
        abort(403);
        $participant = User::findOrFail($participant);
        $authToken = $participant->authTokens()->byKey($token)->first();

        if($authToken instanceof AuthToken && $authToken->isUsable()) {
            if(!$participant->email_verified) {
                $participant->email_verified = true;
                $participant->save();
            }

            $authToken->use();

            $platform = config('platforms');

            if($destination = $platform[$destination] ?? false) {
                $jwt = JWT::encode([
                    'iss' => route('root'),
                    'aud' => $destination['audience'],
                    'iat' => Carbon::now()->timestamp,
                    'exp' => Carbon::now()->addDays(2)->timestamp,
                    'user' => $participant
                ], env('JWT_SECRET'));

                return redirect(str_replace('{token}', $jwt, $destination['redirect']));
            }

            return redirect(route('user'))->withCookie(
                new Cookie('auth', $authToken->key, Carbon::now()->addSeconds(AuthToken::TTL), '/')
            );
        }

        return view('pages.notification', [
            'message' => trans('user.link_expired'),
        ]);
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
        return view('pages.user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function address() {
        return view('pages.ico-address');
    }

    /**
     * @return \Illuminate\View\View
     */
    function affiliate() {
        return view('pages.affiliate');
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
