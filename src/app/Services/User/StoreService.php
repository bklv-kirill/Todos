<?php

namespace App\Services\User;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;

class StoreService
{
    public function store(array $validated): RedirectResponse
    {
        if (User::where([
            "email" => $validated["email"],
            "login" => $validated["login"],
        ])->exists()) return redirect()->route("user.create")->withInput($validated)->withErrors([
            "email" => "Email is occupied",
            "login" => "Login is occupied",
        ]);
        else if (User::where("login", $validated["login"])->exists()) return redirect()->route("user.create")->withErrors(["login" => "Login is occupied"])->withInput($validated);
        else if (User::where("email", $validated["email"])->exists()) return redirect()->route("user.create")->withErrors(["email" => "Email is occupied"])->withInput($validated);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route("todos.index");
    }
}