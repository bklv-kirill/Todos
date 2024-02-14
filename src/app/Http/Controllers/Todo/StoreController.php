<?php

namespace App\Http\Controllers\Todo;

use App\Http\Requests\Todo\StoreRequest;

use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $validated = $storeRequest->validated();

        $this->storeService->store(["title" => $validated["title"]], $validated);

        return redirect()->route("todos.index");
    }
}
