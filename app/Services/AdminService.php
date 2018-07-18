<?php
/**
 * Created by IntelliJ IDEA.
 * User: alexandre
 * Date: 29/09/17
 * Time: 13:46
 */

namespace Site\Services;

use Site\Repositories\AdminRepository;
use Site\Validators\AdminValidator;

class AdminService extends Service {

	/**
	 * AdminService constructor.
	 */
	public function __construct(AdminRepository $repository, AdminValidator $validator) {
		$this->repository = $repository;
		$this->validator  = $validator;
	}

}