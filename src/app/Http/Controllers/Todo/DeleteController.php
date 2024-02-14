<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use App\Models\Todo;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Todo $todo): RedirectResponse
    {
        $todo->delete();

        $from = $request->query()["from"] ?? "todos";

        return ($from === "todos" || $from === "groups") ?
            ($from === "todos" ? 
                redirect()->route("todos.index") : 
                redirect()->route("groups.index")) : 
            redirect()->route("groups.show", $from);

    }
}
