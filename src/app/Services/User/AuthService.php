<?php

namespace App\Services\User;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function auth(array $validated): bool
    {
        return Auth::attempt($validated);
    }
}