<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [TaskController::class, 'index']);       // list all tasks
Route::get('/tasks/{id}', [TaskController::class, 'show']);  // get single task
Route::post('/tasks', [TaskController::class, 'store']);     // create task
Route::put('/tasks/{id}', [TaskController::class, 'update']);    // full update
Route::patch('/tasks/{id}', [TaskController::class, 'update']);  // partial update
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);