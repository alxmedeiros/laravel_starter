<?php

namespace Site\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Site\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

	public function showLinkRequestForm() {
		$pageOpts = [
			'pageStyles'=> [
				'/themes/remark/assets/examples/css/pages/forgot-password.css'
			]
		];

		return view('auth.passwords.email', $pageOpts);
	}

}
