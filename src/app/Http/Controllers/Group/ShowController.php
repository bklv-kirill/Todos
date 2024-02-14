<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

use App\Models\Group;
use Illuminate\Support\Facades\Gate;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Group $group): View
    {
        Gate::authorize("show-update-group", $group);
        
        return view("groups.show", compact(["group"]));
    }
}
