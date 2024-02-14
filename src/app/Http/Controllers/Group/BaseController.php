<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;

use App\Services\Group\{
    IndexService,
    StoreService,
};

class BaseController extends Controller
{
    public $indexService;
    public $storeService;

    public function __construct(
        IndexService $indexService,
        StoreService $storeService
)
    {
        $this->indexService = $indexService;
        $this->storeService = $storeService;
    }
}