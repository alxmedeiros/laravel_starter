<?php

namespace Site\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
   ];
}
