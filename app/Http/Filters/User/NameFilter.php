<?php

namespace App\Http\Filters\User;

use App\Http\Filters\Filter;
use Illuminate\Database\Query\Builder;

class NameFilter extends Filter
{
    public function __construct(protected readonly string $name)
    {
    }
    public function filter(Builder $builder): Builder
    {
        return $builder->where('name', 'LIKE', '%' . $this->name);
    }
}
