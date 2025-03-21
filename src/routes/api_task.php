<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get("/tasks", [TaskController::class,"index"])->middleware("auth:sanctum");
Route::post("/tasks", [TaskController::class,"store"])->middleware("auth:sanctum");
Route::get("/tasks/{task}", [TaskController::class,"show"])->middleware("auth:sanctum");
Route::patch("/tasks/{task}", [TaskController::class,"update"])->middleware("auth:sanctum");
Route::delete("/tasks/{task}", [TaskController::class, "destroy"])->middleware("auth:sanctum");