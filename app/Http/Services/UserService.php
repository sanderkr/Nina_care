<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(public readonly User $user)
    {
    }

    public function index(): LengthAwarePaginator
    {
        return $this->user::paginate(10);
    }
}
