<?php

namespace Site\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Site\Entities\Customer;
use Site\Entities\User;
use Site\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Site\Jobs\SendVerificationEmail;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo='/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        $this->pageOpts=[
            'pageStyles'=>[
                '/themes/remark/assets/examples/css/pages/register-v3.css'
            ],
            'pagePlugins'=>[
                '/themes/remark/assets/vendor/screenfull/screenfull.js',
                '/themes/remark/assets/vendor/formatter/jquery.formatter.js'
            ],
            'pageScripts'=>[
                '/themes/remark/assets/js/Plugin/material.min.js',
                '/themes/remark/assets/js/Plugin/formatter.min.js',
                '/site/js/jquery.maskedinput.js',
            ]
        ];

        return view('customer.auth.register', $this->pageOpts);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {

        $validator=Validator::make($data, [
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6|confirmed',
        ]);

        return $validator;
    }

    public function register(Request $request) {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        // event(new Registered($user=$this->create($request->all())));

        // return $this->registered($request, $user)
        //    ?: redirect($this->redirectPath());
        return redirect()->route('login')->with('status', 'Cadastro efetuado com sucesso! Faça seu login.');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \Site\Entities\User
     */
    protected function create(array $data) {

        $customer=Customer::create([
            'type'=>'pf',
            'email'=>$data['email'],
            'national_id'=>$data['national_id'],
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone']
        ]);

        return User::create([
            'name'=>$data['first_name'].' '.$data['last_name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
            'customer_id'=>$customer->id,
            'verified'=>1,
            'email_token'=>base64_encode($data['email'])
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function verify($token) {

        $user = User::where('email_token', $token)->first();

        if ( $user ) {

            $user->verified = 1;
            $user->email_token = '';

            if ($user->save()){

                return redirect()->route('login')->with('account_verified', 'Seu cadastro foi verificado com sucesso.');
            }

        } else {
            return redirect()->route('login')->with('error', 'Token inválido ou inexistente. Tente fazer o login, sua conta já pode está validada.');
        }


    }

}
