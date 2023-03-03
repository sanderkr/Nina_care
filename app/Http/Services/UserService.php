<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(
        private readonly User          $user,
        private readonly FilterService $filterService,
    )
    {
    }

    public function index(array $request): LengthAwarePaginator
    {
        if (!empty($request['filter'])) {
            return $this->filterService->filterUsers($request);
        }

        return $this->user::paginate(10);
    }
}
