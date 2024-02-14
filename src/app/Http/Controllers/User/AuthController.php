<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\AuthRequest;

use Illuminate\Http\RedirectResponse;

class AuthController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $authRequest): RedirectResponse
    {
        $validated = $authRequest->validated();

        $result = $this->authService->auth($validated);

        return $result ? redirect()->route("todos.index") : redirect()->route("user.login")->withInput($validated)->withErrors(["auth" => "Ошибка входа"]);
    }
}
