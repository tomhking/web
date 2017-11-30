<?php

namespace App\Http\Controllers;

use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ContentController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    function home(Request $request)
    {
        $tokenDecimals = config('ico.decimals');
        $raisedDecimals = env('ICO_RAISED_DECIMALS', 0);
        $softCap = config('ico.softCap');
        $hardCap = config('ico.hardCap');
        $tokensSoldRaw = Cache::get('tokens_sold', ['amount' => 0])['amount'] ?? 0;

        $tokensSold = bcdiv($tokensSoldRaw, bcpow(10,  $tokenDecimals - $raisedDecimals)) / pow(10, $raisedDecimals);

        $currentBonus = false;

        foreach (config('ico.bonuses') as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                break;
            }
        }

        return response(view('pages.home', [
            'softCap' => $softCap,
            'hardCap' => $hardCap,
            'progress' => ($tokensSold / $hardCap) * 100,
            'tokensSold' => $tokensSold,
            'raisedDecimals' => $raisedDecimals,
            'canGetFreeTokens' => false,
            'currentBonus' => $currentBonus,
            'email' => filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) ? $request->get('email') : '',
            'courses' => array_slice($courses = app()->make('courses'), 0, 6)
        ])->render());
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    function ico(Request $request) {
        if (env('APP_ENV', 'production') != 'local' && $request->get('key') != env('ICO_PREVIEW_KEY')) {
            abort(404);
        }

        $icoStart = Carbon::createFromTimestamp(env('ICO_STARTS_AT'));
        $icoEnd = Carbon::createFromTimestamp(env('ICO_ENDS_AT'));

        $showAddress = !!$request->cookie('participant', false);
        $displaySignUp = $request->has('email');

        $raisedDecimals = env('SOLD_COUNTER_DECIMALS', 0);
        $tokensSold = bcdiv(Cache::get('tokens_sold', ['amount' => 0])['amount'] ?? 0, bcpow(10, env('TOKEN_DECIMALS') - $raisedDecimals)) / pow(10, $raisedDecimals);

        $hardCap = env('ICO_HARD_CAP');
        $softCap = env('ICO_SOFT_CAP');

        $progress = $tokensSold / $hardCap * 100;

        $icoAddress = env('ICO_ADDRESS');
        $icoRate = env('ICO_RATE');
        $totalSupply = env('TOKEN_SUPPLY');


        if($request->get('key') == env('ICO_PREVIEW_KEY') && $request->has('mock')) {
            switch ($request->get('mock')) {
                case "pre_ico_addr_unavailable":
                case "pre_ico_addr_available":
                    $icoStart = Carbon::today()->addDay();
                    $icoEnd = $icoStart->copy()->addDay();
                    break;
                case "ico_started_pre_softcap":
                case "ico_started_pre_hardcap":
                    $icoStart = Carbon::today()->subDay();
                    $icoEnd = Carbon::today()->addDays(2);
                    $tokensSold = ($request->get('mock') == "ico_started_pre_softcap" ? $softCap : $hardCap) / 2;
                    break;
                case "ico_ended_pre_softcap":
                case "ico_ended_pre_hardcap":
                case "ico_ended_hardcap":
                    $icoStart = Carbon::today()->subDay();
                    $icoEnd = Carbon::today();
                    $tokensSold = ($request->get('mock') == "ico_ended_pre_softcap" ? $softCap : $hardCap) / 2;
                    $tokensSold = $request->get('mock') == "ico_ended_hardcap" ? $hardCap : $tokensSold;
                    break;
            }

            $showAddress = $request->has('participant');
            $progress = $tokensSold / $hardCap * 100;
        }

        return view('pages.ico', compact(
            'icoStart',
            'icoEnd',
            'icoAddress',
            'hardCap',
            'softCap',
            'tokensSold',
            'showAddress',
            'raisedDecimals',
            'progress',
            'icoRate',
            'totalSupply',
            'displaySignUp'
        ));
    }

    /**
     * @return \Illuminate\View\View
     */
    function mvp() {
        $courses = app()->make('courses');
        return view('pages.mvp', compact('courses'));
    }

    /**
     * @return \Illuminate\View\View
     */
    function faq() {
        return view('pages.faq');
    }

    /**
     * @param $course
     * @param $lesson
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Http\Redirector
     */
    function lesson($course, $lesson) {
        $availableCourses = collect(app()->make('courses'))->keyBy('key');
        if($availableCourses->has($course)) {
            if($lesson != 'intro') {
                return redirect(route('lesson', ['course' => $course, 'lesson' => 'intro']));
            }

            $hasLanding = file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'));

            return view('pages.courses.'.$course.'.lesson-'.$lesson, compact('course', 'lesson', 'hasLanding'));
        }

        abort(404);
    }

    /**
     * @param $course
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Http\Redirector
     */
    function course($course) {
        $availableCourses = collect(app()->make('courses'))->keyBy('key');
        if($availableCourses->has($course)) {
            if(!file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'))) {
                return redirect(route('lesson', ['course' => $course, 'lesson' => 'intro']));
            }
            return view('pages.courses.'.$course.'.landing');
        }

        abort(404);
    }

    /**
     * @param $course
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    function redirectLanding($course) {
        $mappings = [
            'web-developer' => 'full-stack-web-developer',
            'smart-contract-developer' => 'smart-contracts',
        ];
        return redirect(route('course', ['course' => $mappings[$course] ?? $course]), 301);
    }
}
