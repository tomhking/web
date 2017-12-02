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
        $tokenDecimals = config('ico.decimals');
        $softCap = config('ico.softCap');
        $hardCap = config('ico.hardCap');
        $tokensSoldRaw = Cache::get('tokens_sold', ['amount' => 0])['amount'] ?? 0;

        $tokensSold = bcdiv($tokensSoldRaw, bcpow(10,  $tokenDecimals));

        $batchCount = 33;
        $batchSize = bcdiv($hardCap, $batchCount);
        $currentBatchNumber = bcdiv($tokensSold, $batchSize);
        $currentBatchSold = bcmod($tokensSold, $batchSize);

        $currentBonus = false;

        foreach (config('ico.bonuses') as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                break;
            }
        }

        $softCapPart = 45;

        $progress = $softCapPart + (100-$softCapPart) * ($tokensSold / $hardCap);

        view()->share([
            'softCap' => $softCap,
            'hardCap' => $hardCap,
            'softCapReached' => $tokensSold >= $softCap,
            'progressSoftCap' => $tokensSold <= $softCap ? ($tokensSold / $softCap) * 100 : 100,
            'progress' => $progress,
            'tokensSold' => $tokensSold,
            'currentBonus' => $currentBonus,
            'canGetFreeTokens' => false,

            'softCapPart' => $softCapPart,
            'batchCount' => $batchCount,
            'batchSize' => $batchSize,
            'currentBatchNumber' => $currentBatchNumber,
            'currentBatchSold' => $currentBatchSold,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    function home(Request $request)
    {
        return response(view('pages.home', [
            'email' => filter_var($request->get('email'), FILTER_VALIDATE_EMAIL) ? $request->get('email') : '',
            'courses' => array_slice($courses = app()->make('courses'), 0, 6)
        ])->render());
    }

    /**
     * Airdrop route
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function airdrop(Request $request) {
        if(!auth()->check()) {
            session()->put('airdrop', 10);
        }
        return redirect()->route('home');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function redirectLanding($course) {
        $mappings = [
            'web-developer' => 'full-stack-web-developer',
            'smart-contract-developer' => 'smart-contracts',
        ];
        return redirect(route('course', ['course' => $mappings[$course] ?? $course]), 301);
    }
}
