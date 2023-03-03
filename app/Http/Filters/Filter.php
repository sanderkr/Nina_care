<?php

namespace App\Http\Filters;

use Illuminate\Database\Query\Builder;

abstract class Filter
{
    abstract public function filter(Builder $builder): Builder;
}
