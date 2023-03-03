<?php

namespace App\Http\Filters\User;

use Illuminate\Database\Query\Builder;

class NameFilter
{
    public function __construct(protected readonly string $name)
    {
    }
    public function filter(Builder $builder): Builder
    {
        return $builder->where('name', 'LIKE', '%' . $this->name);
    }
}
