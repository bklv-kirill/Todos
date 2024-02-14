<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Services\User\{
    AuthService,
    StoreService,
};

class BaseController extends Controller
{
    public $storeService;
    public $authService;

    public function __construct(StoreService $storeService, AuthService $authService)
    {
        $this->storeService = $storeService;
        $this->authService = $authService;
    }
}