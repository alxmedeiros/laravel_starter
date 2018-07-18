<?php
namespace Site\Services;

use Illuminate\Database\Eloquent\Model;

interface ServiceInterface {

	public function beforeSave(array $arr);

	public function afterSave(Model $arr, array $data);

}