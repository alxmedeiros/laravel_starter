<?php
/**
 * Created by IntelliJ IDEA.
 * User: foccus
 * Date: 29/08/17
 * Time: 17:07
 */

namespace Site\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Prettus\Validator\Exceptions\ValidatorException;

class Service implements ServiceInterface {

	/**
	 * @var RepositoryInterface
	 */
	protected $repository;

	/**
	 * @var LaravelValidator
	 */
	protected $validator;

    /**
     * @return RepositoryInterface
     */
    public function getRepository() {
        return $this->repository;
    }

    /**
     * @return LaravelValidator
     */
    public function getValidator() {
        return $this->validator;
    }

	public function paginate($limit = 20) {
		return $this->repository->orderBy('created_at', 'desc')->paginate($limit);
	}

	public function all() {
		return $this->repository->orderBy('created_at', 'desc')->all();
	}

	public function find($id) {
		return $this->repository->find($id);
	}

    public function findByField($field, $value, $columns = ['*']) {
        return $this->repository->findByField($field, $value, $columns);
    }

	public function pushCriteria($mixed) {
		return $this->repository->pushCriteria($mixed);
	}

	public function create(array $data) {

		try {

			DB::beginTransaction();

//			$this->validator->with($data)->passesOrFail();

			$data = $this->beforeSave($data);

			$return = $this->repository->create($data);

			$this->afterSave($return, $data);

			DB::commit();

			return $return;
		} catch (ValidatorException $e) {

			DB::rollBack();

			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}

	}

	public function update(array $data, $id) {
		try {

			DB::beginTransaction();

			$data = $this->beforeSave($data);

			$return = $this->repository->update($data, $id);

			$this->afterSave($return, $data);

			DB::commit();

			return $return;

		} catch (ValidatorException $e) {

			DB::rollBack();

			return [
				'error' => true,
				'message' => $e->getMessageBag()
			];
		}
	}

	public function delete($id) {
		return $this->repository->delete( $id );
	}

	public function beforeSave(array $arr) {
		// TODO: Implement beforeSave() method.
		return $arr;
	}

	public function afterSave(Model $arr, array $data) {
		// TODO: Implement afterSave() method.
	}
}