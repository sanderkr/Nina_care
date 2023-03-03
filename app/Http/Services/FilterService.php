<?php

namespace App\Http\Services;

use App\Http\Filters\Filter;
use App\Http\Filters\Filters;

use App\Models\User;
use Illuminate\Contracts\Pipeline\Pipeline;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterService
{
    public static function filterUsers(array $filters): LengthAwarePaginator
    {
        return app(Pipeline::class)
            ->send(User::query())
            ->through(self::filters($filters))
            ->thenReturn()
            ->paginate(10);
    }

    public static function filters(array $filters): array
    {
        return collect($filters)
            ->map(fn (array $data, string $key): Filter =>
                Filters::from($key)->createFilter($data))
            ->values()
            ->all();
    }
}
