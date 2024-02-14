<?php

namespace App\Services\Group;

use Illuminate\Support\Facades\Auth;

use App\Models\Group;

class StoreService
{
    public function store(array $find, $validated)
    {
        Group::updateOrCreate($find, [...$validated, "user_id" => Auth::id()]);
    }
}