<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require "api_task.php";

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/login", [AuthController::class, "login"]);

Route::post("/register", [AuthController::class,"register"]);