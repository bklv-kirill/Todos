<?php

namespace App\Http\Controllers\Todo;

use Illuminate\Http\Request;

use Illuminate\View\View;

use App\Models\Todo;
use Illuminate\Support\Facades\Gate;

class EditController extends BaseController
{
    public function __invoke(Request $request, Todo $todo): View
    {
        Gate::authorize("show-update-todo", $todo);
        
        $groups = $this->indexService->getGroups();

        $from = $request->query()["from"] ?? "todos";

        return view("todos.edit", compact(["todo", "groups", "from"]));
    }
}
