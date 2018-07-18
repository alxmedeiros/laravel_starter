<?php

namespace Site\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class AdminValidator extends LaravelValidator
{

    protected $rules = [
		'name' => 'required',
		'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    protected $attributes = [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
    ];
}
