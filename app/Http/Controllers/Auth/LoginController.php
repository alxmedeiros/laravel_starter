<?php

namespace Site\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Site\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

	/**
	 * Show the application's login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function showLoginForm() {

        $this->pageOpts = [
            'pageStyles' => [
                '/themes/remark/assets/examples/css/pages/login-v3.css'
            ],
            'pagePlugins' => [
                '/themes/remark/assets/vendor/screenfull/screenfull.js'
            ],
            'pageScripts' => [
                '/themes/remark/assets/js/Plugin/material.min.js',
            ]
        ];

        return view('auth.login', $this->pageOpts);
    }

	// protected function attemptLogin(Request $request) {
	// 	return Auth::attempt(
	// 		$this->credentials($request) + ['verified' => 1],
	// 		$request->filled('remember')
	// 	);
	// }

	protected function sendFailedLoginResponse(Request $request) {
		throw ValidationException::withMessages([
			$this->username() => [trans('auth.failed_or_account_not_activated')],
		]);
	}

    public function login(Request $request) {
        $return = $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()->with('error', 'Login e/ou senha inválidos')->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request) {

        Auth::guard()->logout();

        $request->session()->invalidate();

        return redirect()->intended(route('login'));
    }

}
