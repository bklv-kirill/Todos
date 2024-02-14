<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): View
    {
        return view("register");
    }
}
