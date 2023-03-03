<?php

namespace App\Http\Filters\User;

use App\Http\Filters\Filter;
use Closure;
use Illuminate\Database\Query\Builder;

class NameFilter extends Filter
{
  public function handle(Builder $builder, Closure $closure): Builder
    {
        if (isset($this->data['name'])) {
            $builder->where('name', 'LIKE', '%' . $this->data['name'] . '%');
        }

        return $closure($builder);
    }
}
