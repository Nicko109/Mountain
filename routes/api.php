<?php

use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'jwt.auth'], function () {
Route::apiResource('tasks', \App\Http\Controllers\Api\TaskController::class);
Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);
Route::apiResource('guarantees', \App\Http\Controllers\Api\GuaranteeController::class);
Route::apiResource('performers', \App\Http\Controllers\Api\PerformerController::class);
});



Route::group(['middleware' => 'jwt.auth'], function () {
    Route::apiResource('/admin/tasks', \App\Http\Controllers\Admin\TaskController::class);
    Route::apiResource('/admin/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::apiResource('/admin/guarantees', \App\Http\Controllers\Admin\GuaranteeController::class);
    Route::apiResource('/admin/performers', \App\Http\Controllers\Admin\PerformerController::class)
        ->middleware('can:viewAny,' . Performer::class);;
});




Route::group(['middleware' => 'secure', 'prefix' => 'mount'], function () {
    Route::apiResource('tasks', \App\Http\Controllers\ApiMount\TaskController::class)->names('mount.tasks');
    Route::apiResource('categories', \App\Http\Controllers\ApiMount\CategoryController::class)->names('mount.categories');
    Route::apiResource('guarantees', \App\Http\Controllers\ApiMount\GuaranteeController::class)->names('mount.guarantees');
    Route::apiResource('performers', \App\Http\Controllers\ApiMount\PerformerController::class)->names('mount.performers');
});



Route::post('/categories/{category}/tasks', [\App\Http\Controllers\Api\CategoryController::class, 'storeCategoryTask']);
Route::post('/tasks/{task}/performers', [\App\Http\Controllers\Api\TaskController::class, 'storeTaskPerformer']);
Route::post('/performers/{performer}/tasks', [\App\Http\Controllers\Api\PerformerController::class, 'storePerformerTask']);
