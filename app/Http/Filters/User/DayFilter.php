<?php

namespace App\Http\Filters\User;

use Illuminate\Database\Query\Builder;

class DayFilter
{
    public function __construct(protected readonly string $day)
    {
    }

    public function filter(Builder $builder): Builder
    {
        return $builder->whereHas('days',
            fn(Builder $query) => $query->whereIn('day', $this->day)
        );
    }
}
