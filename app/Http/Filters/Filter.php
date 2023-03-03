<?php

namespace App\Http\Filters;

use Closure;
use Illuminate\Database\Query\Builder;

abstract class Filter
{
    public function __construct(protected readonly array $data)
    {
    }
    abstract public function handle(Builder $builder, Closure $closure): Builder;
}
