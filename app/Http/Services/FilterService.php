<?php

namespace App\Http\Services;

use App\Http\Filters\User\AgeFilter;
use App\Http\Filters\User\DayFilter;
use App\Http\Filters\User\NameFilter;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterService
{
    public function filterUsers(array $filters): LengthAwarePaginator
    {
        $query = User::query();

        if (isset($filters['name'])) {
            $query = (new NameFilter($filters['name']))->filter($query);
        }

        if (isset($filters['age'])) {
            $query = (new AgeFilter($filters['age']))->filter($query);
        }

        if (isset($filters['day'])) {
            $query = (new DayFilter($filters['day']))->filter($query);
        }

        return $query::paginate(10);
    }
}
