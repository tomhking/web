<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\LogIn;
use App\User;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function details(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|min:2|max:35',
            'last_name' => 'required|string|min:2|max:35',
            'country' => 'required|string|valid-country',
            'birthday' => 'required|date',

            // for some strange reason absence of 'required' rule does not stop other rules from running when input is empty
            'wallet' => !empty($request->get('wallet')) ? 'required|string|size:42' : '',
        ]);

        $user = auth()->user();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->country = $request->get('country');
        $user->birthday = $request->get('birthday');
        $user->wallet = $request->get('wallet');

        $user->save();

        if (empty($user->identification) && $request->hasFile('file') && $request->file('file')->isValid()) {
            $this->validate($request, [
                'file' => 'required|image|max:10240',
            ]);

            $file = $request->file('file');

            try {
                $path = $file->storeAs(config('app.env') . '-kyc', str_random(64), 's3');

                if (!$path) {
                    throw new \Exception('Upload failed');
                }

                $user->identification = [
                    'path' => $path,
                    'extension' => $file->guessExtension(),
                    'mime' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ];

                $user->save();
            } catch (\Exception $e) {
                Log::error("Upload failed", [
                    'message' => $e->getMessage(),
                ]);
                return back()->withErrors(__('user.upload-failed'));
            }
        }

        return back()->with('status', __('user.profile-saved'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function user()
    {
        if (!auth()->user()->isAirdropParticipant()) {
            return redirect()->route('address');
        }

        return view('pages.user');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function address()
    {
        $ico = config('ico');

        if (!$ico['started']) {
            return redirect()->route('affiliate');
        }

        $currentBonus = false;
        $rate = $ico['rate'];

        foreach ($ico['bonuses'] as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
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
    function participate()
    {
        return view('pages.participate');
    }

    function participate2() {
        return view('pages.participate2');
    }

    function participate3() {
        return view('pages.participate3');
    }

    function participatefaq() {
        return view('pages.participatefaq');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showDetails(Request $request)
    {
        $currentCountry = false;

        try {
            $result = app()->make('geoip')->country($request->ip());

            if($result instanceof \GeoIp2\Model\Country) {
                $currentCountry = $result->country->isoCode;
            }
        }catch (\GeoIp2\Exception\AddressNotFoundException $e) {
            //
        }

        return view('pages.details', [
            'user' => auth()->user(),
            'countries' => app()->make('countries'),
            'currentCountry' => $currentCountry,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showPassword()
    {
        return view('pages.password');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = auth()->user();

        $user->password = Hash::make($request->get('password'));
        $user->save();

        return back()->with('status', __('user.password-changed'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function affiliate()
    {
        $banners = config('affiliate.banners');
        $banners = $banners[config('app.locale')] ?? $banners[config('app.fallback_locale')];
        $referralCount = auth()->user()->referrals()->count();
        return view('pages.affiliate', compact('banners', 'referralCount'));
    }

    /**
     * Sets affiliate cookie
     *
     * @param $id
     * @return $this
     */
    public function setAffiliateCookie($id)
    {
        return redirect()->route('home')->withCookie(
            new Cookie('bd-aff', (int)$id > 0 ? (int)$id : 0, Carbon::now()->addMonths(3))
        );
    }
}
