<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
//
Route::resource('tasks',\App\Http\Controllers\TaskController::class);
Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('guarantees',\App\Http\Controllers\GuaranteeController::class);
Route::resource('performers',\App\Http\Controllers\PerformerController::class);

