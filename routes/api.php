<?php

use App\Http\Controllers\Api\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/patients', [UserApiController::class, 'getAll']);
Route::get('/patients/{id}', [UserApiController::class, 'show']);
Route::put('/patients/{id}', [UserApiController::class, 'input']);


Route::put('/patients/update', [UserApiController::class, 'Update']);
