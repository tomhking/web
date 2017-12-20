<?php

namespace App\Http\Controllers;

use App\Participant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class ContentController extends Controller
{
    private $appendedCourses = [];
    private $icoData = [];

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

        $milestoneStep = bcpow(10,6);
        $milestoneCompleted = bcmod($tokensSold, bcpow(10, 6 ));
        $milestoneRemaining = bcsub($milestoneStep, $milestoneCompleted);
        $milestoneProgress = ($milestoneCompleted / $milestoneStep) * 100;
        $nextMilestone = bcadd($tokensSold, $milestoneRemaining);
        $currentMilestone = bcsub($nextMilestone, $milestoneStep);

        $currentBonus = false;

        foreach (config('ico.bonuses') as $item) {
            if (Carbon::now()->between($item['from'], $item['to'])) {
                $currentBonus = $item;
                break;
            }
        }

        $softCapPart = 33;

        $progress = $softCapPart + (100-$softCapPart) * ($tokensSold / $hardCap);

        view()->share($this->icoData = [
            'softCap' => $softCap,
            'hardCap' => $hardCap,
            'softCapReached' => $tokensSold >= $softCap,
            'progressSoftCap' => $tokensSold <= $softCap ? ($tokensSold / $softCap) * 100 : 100,
            'progress' => $progress,
            'tokensSold' => (int) $tokensSold,
            'tokensSoldFormatted' => number_format($tokensSold),
            'currentBonus' => $currentBonus,
            'canGetFreeTokens' => false,

            'softCapPart' => $softCapPart,
            'milestoneProgress' => $milestoneProgress,
            'nextMilestone' => (int) $nextMilestone,
            'nextMilestoneFormatted' => bcdiv($nextMilestone, $milestoneStep).'M',
            'currentMilestone' => (int) $currentMilestone,
            'currentMilestoneFormatted' => bcdiv($currentMilestone, $milestoneStep).'M',
        ]);

        $this->appendedCourses = [  // temporary! needed on this page only for now
            'url' => route('course', ['course' => 'cryptocurrencies-intro']),
            'key' => 'cryptocurrencies-intro',
            'password' => env('STATS_KEY'),
            'image' => asset_rev('blockchain-basics.jpg'),
            'sponsor' => asset_rev('ethos.png'),
            'overlay' => 'grey available',
            'description' => __('courses.description-18-feb'),
            'title' => trans('courses.title_cryptocurrencies_intro'),
            'isMvp' => true,
            'isNew' => true,
            'lessons' => [
                [
                    'title' => 'Intro Lecture',
                    'key' => 'intro',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'kkuuZXv-1M4',
                            'duration' => 3 * 60 + 51,
                            'title' => 'Intro Lecture',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-0/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-0/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'What is a Cryptocurrency or Crypto Token',
                    'key' => 'what-is-a-cryptocurrency-or-crypto-token',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'qOG2qzbN1QM',
                            'duration' => 4 * 60,
                            'title' => 'What is a Cryptocurrency or Crypto Token',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-1/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-1/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'Why Cryptocurrencies?',
                    'key' => 'why-cryptocurrencies',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'M4xK1FO8Z2s',
                            'duration' => 4 * 60 + 43,
                            'title' => 'Why Cryptocurrencies?',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-2/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-2/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'How to Get Started With Cryptocurrencies?',
                    'key' => 'how-to-get-started-with-cryptocurrencies',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => '227Fl2UKEfs',
                            'duration' => 5 * 60 + 9,
                            'title' => 'How to Get Started With Cryptocurrencies?',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-3/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-3/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'What is Bitcoin?',
                    'key' => 'what-is-bitcoin',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'PKwVoedQr2I',
                            'duration' => 9 * 60 + 38,
                            'title' => 'What is Bitcoin?',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-4/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-4/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'The Economics of Bitcoin',
                    'key' => 'the-economics-of-bitcoin',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'hZP8Z7G10Sc',
                            'duration' => 5 * 60 + 39,
                            'title' => 'The Economics of Bitcoin',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-5/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-5/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'Solving Bitcoin\'s Problems - Ethereum',
                    'key' => 'solving-bitcoins-problems-ethereum',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'j1YKWmDM7TY',
                            'duration' => 6 * 60 + 21,
                            'title' => 'Solving Bitcoin\'s Problems - Ethereum',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-6/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-6/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
                [
                    'title' => 'Checklist for Analysing Crypto BTC vs ETH',
                    'key' => 'checklist-for-analysing-crypto-btc-vs-eth',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => 'J8NTEtsCiqE',
                            'duration' => 6 * 60 + 8,
                            'title' => 'Checklist for Analysing Crypto BTC vs ETH',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/checklist.pdf'),
                            'title' => 'Checklist to Analyzing Cryptocurrencies',
                        ],
                    ],
                ],
                [
                    'title' => 'A Whole New World of Coins',
                    'key' => 'a-whole-new-world-of-coins',
                    'materials' => [
                        [
                            'type' => 'video',
                            'videoId' => '-1LEEK3lzPw',
                            'duration' => 6 * 60 + 37,
                            'title' => 'A Whole New World of Coins',
                        ],
                        [
                            'type' => 'slides',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-8/slides.pdf'),
                            'title' => 'Lecture slides',
                        ],
                        [
                            'type' => 'pdf',
                            'file' => resource_path('courses/cryptocurrencies-intro/lecture-8/transcript.pdf'),
                            'title' => 'Lecture transcript',
                        ],
                    ],
                ],
            ]
        ];
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
     * Returns ICO details in JSON
     * @return \Illuminate\Http\JsonResponse
     */
    public function icoData()
    {
        return response()->json($this->icoData);
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
     * @param $courseKey
     * @param $lessonKey
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function lesson($courseKey, $lessonKey) {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($courseKey)) {
            $course = $availableCourses->get($courseKey);
            $lessons = collect($course['lessons'] ?? []);

            if($course['password'] ?? false) {
                $inputPassword = session()->get('course-password-'.$courseKey, request()->get('key'));
                if($inputPassword == $course['password']) {
                    session()->put('course-password-'.$courseKey, $inputPassword);
                } else {
                    abort(404);
                }
            }

            $lesson = null;
            $lessonNumber = null;
            $lessons->where('key', $lessonKey)->first(function($data, $index) use (&$lesson, &$lessonNumber) {
                $lesson = $data;
                $lessonNumber = $index + 1;
            });

            $isDemo = $lessons->count() == 0;

            if($isDemo && $lessonKey != 'intro') {
                return redirect()->route('lesson', [$courseKey, 'intro']);
            }

            $hasLanding = file_exists(resource_path('views/pages/courses/'.$courseKey.'/landing.blade.php'));

            return view('pages.courses.'.$courseKey.'.lesson-intro', compact(
                'courseKey',
                'course',
                'lessonKey',
                'lesson',
                'lessonNumber',
                'hasLanding',
                'isDemo'
            ));
        }

        abort(404);
    }

    /**
     * @param $courseKey
     * @param $lessonKey
     * @param $materialId
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function lessonAttachmentDownload($courseKey, $lessonKey, $materialId)
    {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($courseKey)) {
            $course = $availableCourses->get($courseKey);
            $lessons = collect($course['lessons'] ?? [])->keyBy('key');

            if($lessons->has($lessonKey)) {
                $lesson = $lessons->get($lessonKey);

                if($material = $lesson['materials'][$materialId] ?? null && isset($material['file']) && file_exists($material['file'])) {
                    return response()->download($material['file'], str_slug($course['title'].' '.$lesson['title'].' '.$material['title']));
                }
            }
        }

        abort(404);
    }

    /**
     * @param $course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    function course($course) {
        $availableCourses = collect(app()->make('courses'))->push($this->appendedCourses)->keyBy('key');
        if($availableCourses->has($course)) {
            $courseData = $availableCourses->get($course);
            if($courseData['password'] ?? false) {
                $inputPassword = session()->get('course-password-'.$course, request()->get('key'));
                if($inputPassword == $courseData['password']) {
                    session()->put('course-password-'.$course, $inputPassword);
                } else {
                    abort(404);
                }
            }

            if(!file_exists(resource_path('views/pages/courses/'.$course.'/landing.blade.php'))) {
                return redirect(route('lesson', ['course' => $course, 'lesson' => 'intro']));
            }
            return view('pages.courses.'.$course.'.landing', [
                'course' => $availableCourses->get($course),
            ]);
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
