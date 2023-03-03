<?php

namespace App\Http\Filters;

use App\Http\Filters\User\AgeFilter;
use App\Http\Filters\User\DaysFilter;
use App\Http\Filters\User\NameFilter;

enum Filters: string
{
    case Days = 'days';
    case Age = 'age';
    case Name = 'name';

    public function createFilter(array $data): Filter
    {
        return match ($this) {
            self::Days => new DaysFilter($data),
            self::Age => new AgeFilter($data),
            self::Name => new NameFilter($data),
        };
    }
}
