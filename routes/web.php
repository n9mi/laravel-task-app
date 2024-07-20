<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tasks');
});

Route::get('/tasks', [TaskController::class, 'findAll']);

Route::get('/error-403', function () {
    return view('pages.errors.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.errors.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.errors.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.errors.error-503', ['type_menu' => 'error']);
});
