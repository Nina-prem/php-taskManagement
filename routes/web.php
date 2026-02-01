<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManagementController;
use App\Models\Task;
use App\Models\TaskManagement;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route::resource('tasks', TaskManagementController::class);

 Route::get('tasks/create',[TaskManagementController::class,'create'])->name('tasks.create');
 route::post('tasks/store',[TaskManagementController::class,'store'])->name('tasks.store');
route::get('tasks/index',[TaskManagementController::class,'index'])->name('tasks.index');
Route::get('tasks/edit/{task}', [TaskManagementController::class, 'edit'])->name('tasks.edit');
Route::put('tasks/update/{task}', [TaskManagementController::class, 'update'])->name('tasks.update');
Route::delete('tasks/delete/{task}', [TaskManagementController::class, 'destroy'])->name('tasks.destroy');


//  Route::delete('tasks/destroy/{task}', [TaskManagementController::class, 'destroy'])->name('tasks.destroy');
