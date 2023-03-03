<?php

namespace App\Http\Filters\User;

use App\Http\Filters\Filter;
use Closure;
use Illuminate\Database\Query\Builder;

class AgeFilter extends Filter
{
    public function handle(Builder $builder, Closure $closure): Builder
    {
        if (isset($this->data['age'])) {
            $builder->where('age', $this->data['age']);
        }

        return $closure($builder);
    }
}
