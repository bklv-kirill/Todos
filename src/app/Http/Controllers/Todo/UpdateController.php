<?php

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;

use App\Http\Requests\Todo\UpdateRequest;

use Illuminate\Http\RedirectResponse;

use App\Models\Todo;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $updateRequest, Todo $todo): RedirectResponse
    {
        $validated = $updateRequest->validated();

        $todo->update($validated);

        $from = $updateRequest->query()["from"];

        return redirect()->route("todos.show", compact(["todo", "from"]));
    }
}
