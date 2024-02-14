<?php

namespace App\Services\Group;

use App\Http\Filters\Group\GroupFilter;

use Illuminate\Support\Facades\Auth;

use App\Models\Group;

class IndexService
{
    public function index(array $filtersData)
    {
        $filter = app()->make(GroupFilter::class, ["queryParams" => array_filter($filtersData)]);
        $groups = Group::filter($filter)->where("user_id", Auth::id());

        !isset($filtersData["date"]) ? $groups->orderByDesc("id") : null;

        return $groups->paginate(10);
    }
}