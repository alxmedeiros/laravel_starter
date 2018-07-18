<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 29/09/17
 * Time: 13:46
 */

namespace Site\Services;


use Site\Repositories\UserRepository;
use Site\Validators\UserValidator;

class UserService extends Service {

	/**
	 * UserService constructor.
	 */
	public function __construct(UserRepository $repository, UserValidator $validator) {
		$this->repository = $repository;
		$this->validator  = $validator;
	}

}