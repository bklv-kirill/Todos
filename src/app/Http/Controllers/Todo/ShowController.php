<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

use App\Models\Todo;

class ShowController extends Controller
{
    public function __invoke(Request $request, Todo $todo): View
    {
        Gate::authorize("show-update-todo", $todo);

        $from = $request->query()["from"] ?? "todos";

        return view("todos.show", compact(["todo", "from"]));
    }
}
