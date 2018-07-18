<?php

namespace Site\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

use Illuminate\Support\Facades\Auth;

/**
 * Class UserLoggedCriteria.
 *
 * @package namespace Site\Criteria;
 */
class UserLoggedCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository) {

        $model = $model->where('admin_id','=', Auth::user()->admin_id );

        return $model;
    }
}
