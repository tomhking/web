<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = route('address');
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validates the user login request.
     * Creates a new account if it does not exist.
     * Logs in the user
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginOrSignUp(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::withEmail($request->get('email'))->first();

        // Deal with existing users
        if($user instanceof User) {
            // Set the password for users who don't yet have one
            if(empty($user->password)) {
                $user->password = Hash::make($request->get('password'));
                $user->save();

                auth()->login($user);

                return redirect($this->redirectTo);
            }

            // Validate login data for the rest
            return $this->login($request);
        }

        // Create a new user
        event(new Registered($user = User::create([
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ])));

        auth()->login($user);

        return redirect($this->redirectTo);
    }
}
