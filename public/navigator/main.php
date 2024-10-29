<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameControllers;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

Route::prefix("user")->group(function () {
    // User
    Route::get("/checknumber/{number?}/{pin?}", [UserController::class, "checkNumber"]);
    Route::get("/profile/{number?}", [UserController::class, "profile"]);
    Route::get("/detail/{number?}", [UserController::class, "userDetail"]);
});

Route::prefix("kategori")->group(function () {
    // Kategori
    Route::get("/barang", [KategoriController::class, "indexBarang"]);
    Route::post("/operator", [KategoriController::class, "indexOperator"]);
});

Route::get("/operator/{id}", [KategoriController::class, "getOperator"]);

Route::get('/{page?}', function () {
    return view('master');
});

Route::get('/{page?}/{subpage?}', function () {
    return view('master');
});

Route::middleware("auth")->group(function () {
    Route::get('api/v2/game-list', [GameControllers::class, "getGames"])->name("getGames");
});