<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tasks');
});

Route::get('/tasks', [TaskController::class, 'findAll'])->name('task.getAll');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');
