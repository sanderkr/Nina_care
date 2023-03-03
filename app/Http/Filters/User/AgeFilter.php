<?php

namespace App\Http\Filters\User;

use Illuminate\Database\Query\Builder;

class AgeFilter
{
    public function __construct(protected readonly string $age)
    {
    }
    public function filter(Builder $builder): Builder
    {
        return $builder->where('age', $this->age);
    }
}
