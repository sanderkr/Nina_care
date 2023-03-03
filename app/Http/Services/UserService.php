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
        if (isset($request['filters']) && !empty($request['filters'])) {
            return $this->filterService::filterUsers($request['filters']);
        }

        return $this->user::paginate(10);
    }
}
