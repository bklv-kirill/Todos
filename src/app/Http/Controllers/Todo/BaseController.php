<?php 

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;

use App\Services\Todo\IndexService;
use App\Services\Todo\StoreService;

class BaseController extends Controller
{
    public $indexService;
    public $storeService;

    public function __construct(StoreService $storeService, IndexService $indexService)
    {
        $this->storeService = $storeService;
        $this->indexService = $indexService;
    }
}