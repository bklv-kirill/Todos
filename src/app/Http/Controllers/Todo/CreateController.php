<?php

namespace App\Http\Controllers\Todo;

use Illuminate\View\View;

class CreateController extends BaseController
{
    public function __invoke(): View
    {
        $groups = $this->indexService->getGroups();
        
        return view("todos.create", compact(["groups"]));
    }
}
