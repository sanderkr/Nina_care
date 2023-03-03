<?php

namespace App\Http\Filters\User;

use App\Http\Filters\Filter;
use Illuminate\Database\Query\Builder;

class AgeFilter extends Filter
{
    public function __construct(protected readonly string $age)
    {
    }
    public function filter(Builder $builder): Builder
    {
        return $builder->where('age', $this->age);
    }
}
