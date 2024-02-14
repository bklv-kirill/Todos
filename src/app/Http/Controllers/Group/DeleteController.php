<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use App\Models\Group;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Group $group): RedirectResponse
    {
        $group->delete();

        return redirect()->route("groups.index");
    }
}
