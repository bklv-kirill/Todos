<?php

namespace App\Http\Controllers\Group;

use App\Http\Requests\Group\IndexRequest;

use Illuminate\View\View;

class IndexController extends BaseController
{
    public function __invoke(IndexRequest $indexRequest): View
    {
        $filtersData = $indexRequest->query();

        $groups = $this->indexService->index($filtersData);

        return view("groups.index", compact(["groups", "filtersData"]));
    }
}
