<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;

use App\Http\Requests\Group\UpdateRequest;

use Illuminate\Http\RedirectResponse;

use App\Models\Group;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $updateRequest, Group $group): RedirectResponse
    {
        $validated = $updateRequest->validated();

        $group->update($validated);

        return redirect()->route("groups.show", compact(["group"]));
    }
}
