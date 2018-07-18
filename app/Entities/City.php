<?php

namespace Site\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class City extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function state() {
        return $this->belongsTo(State::class, 'state', 'slug');
    }

}
