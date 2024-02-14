<?php

namespace App\Http\Controllers\Todo;

use App\Http\Requests\Todo\IndexRequest;

use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filtersData = $indexRequest->query();

        $todos = $this->indexService->index($filtersData);
        $groups = $this->indexService->getGroups();

        return view("todos.index", compact(["todos", "groups", "filtersData"]));
    }
}
