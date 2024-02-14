<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Todo\{
    CreateController,
    DeleteController,
    EditController,
    IndexController,
    ShowController,
    StoreController,
    UpdateController,
};

use App\Http\Controllers\Group\{
    CreateController as GroupCreateController,
    DeleteController as GroupDeleteController,
    EditController as GroupEditController,
    IndexController as GroupIndexController,
    ShowController as GroupShowController,
    StoreController as GroupStoreController,
    UpdateController as GroupUpdateController,
};

use App\Http\Controllers\User\{
    CreateController as UserCreateController,
    StoreController as UserStoreController,
    AuthController,
    LoginController,
    LogOutContoller,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware("auth")->group(function () {
    Route::redirect("/", "/todos");

    Route::name("todos.")->group(function () {
        Route::get("todos", IndexController::class)->name("index");
        Route::get("todos/create", CreateController::class)->name("create");
        Route::post("todos", StoreController::class)->name("store");
        Route::get("todos/{todo}", ShowController::class)->name("show");
        Route::get("todos/{todo}/edit", EditController::class)->name("edit");
        Route::patch("todos/{todo}", UpdateController::class)->name("update");
        Route::delete("todos/{todo}", DeleteController::class)->name("delete");
    });
    
    
    Route::name("groups.")->group(function () {
        Route::get("groups", GroupIndexController::class)->name("index");
        Route::get("groups/create", GroupCreateController::class)->name("create");
        Route::post("groups/store", GroupStoreController::class)->name("store");
        Route::get("groups/{group}", GroupShowController::class)->name("show");
        Route::get("groups/{group}/edit", GroupEditController::class)->name("edit");
        Route::patch("groups/{group}", GroupUpdateController::class)->name("update");
        Route::delete("groups/{group}", GroupDeleteController::class )->name("delete");
    });

    Route::get("logut", LogOutContoller::class)->name("user.logout");

});

Route::middleware("guest")->group(function () {
    Route::name("user.")->group(function () {
        Route::get("login", LoginController::class)->name("login");
        Route::post("login", AuthController::class)->name("auth");
        Route::get("register", UserCreateController::class)->name("create");
        Route::post("register", UserStoreController::class)->name("store");
    });
});

