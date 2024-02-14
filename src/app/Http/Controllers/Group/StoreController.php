<?php

namespace App\Http\Controllers\Group;

use App\Http\Requests\Group\StoreRequest;

use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $storeRequest): RedirectResponse
    {
        $validated = $storeRequest->validated();

        $this->storeService->store(["title" => $validated["title"]] ,$validated);

        return redirect()->route("groups.index");
    }
}
