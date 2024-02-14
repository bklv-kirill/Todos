<?php

namespace App\Services\Todo;

use App\Http\FIlters\Todo\TodoFilter;

use Illuminate\Support\Facades\Auth;

use App\Models\Group;
use App\Models\Todo;

class IndexService
{
    public function index(array $filtersData)
    {
        $filter = app()->make(TodoFilter::class, ["queryParams" => array_filter($filtersData)]);
        $todos = Todo::filter($filter)->where("user_id", Auth::id());

        !isset($filtersData["date"]) ? $todos->orderByDesc("id") : null;

        return $todos->paginate(10);
    }

    public function getGroups()
    {
        return Group::get()->where("user_id", Auth::id());
    }
}