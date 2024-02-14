<?php

namespace App\Services\Todo;

use App\Models\Todo;

use Illuminate\Support\Facades\Auth;

class StoreService
{
    public function store(array $find, $validated)
    {
        Todo::updateOrCreate($find, [...$validated, "user_id" => Auth::id()]);
    }
}