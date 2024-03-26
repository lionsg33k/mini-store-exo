<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;


Route::get("/",[HomeController::class , "index"]);
Route::post("/client/store",[HomeController::class , "store"])->name("client.store");
Route::post("/type/store",[TypeController::class , "store"])->name("type.store");
Route::post("/product/store",[ProductController::class , "store"])->name("products.store");
Route::post("/cart/store",[CartController::class , "store"])->name("carts.store");
