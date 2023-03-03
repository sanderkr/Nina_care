<?php

namespace App\Http\Filters\User;

use Closure;
use App\Http\Filters\Filter;
use Illuminate\Database\Query\Builder;

class DaysFilter extends Filter
{
    public function handle(Builder $builder, Closure $closure): Builder
    {
        if (isset($this->data['days'])) {
            $builder->whereHas('days', fn(Builder $query) =>
                $query->whereIn('day', $this->data['days'])
            );
        }

        return $closure($builder);
    }
}
