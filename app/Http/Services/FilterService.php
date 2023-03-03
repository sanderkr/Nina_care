<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterService
{
    public function filterUsers(array $request): LengthAwarePaginator
    {
        return User::paginate(10);
    }
}
