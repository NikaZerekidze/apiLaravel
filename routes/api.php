<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Route::resource('news', NewsController::class);

Route::get('/news', [NewsController::class , 'index']);
Route::get('/singleNews', [NewsController::class , 'show']);
Route::get('/news/search/{title}',[NewsController::class, 'search']);

Route::post('/register', [UserController::class , 'register']);
//Route::get('/register', [UserController::class , 'register']);


Route::post('/login', [UserController::class , 'login']);



Route::middleware('auth:sanctum')->post('/news/create', [NewsController::class, 'store']);
Route::middleware('auth:sanctum')->post('/logout', [UserController::class, 'logout']);
Route::middleware('auth:sanctum')->put('/news/{id}', [NewsController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/news/{id}', [NewsController::class, 'destroy']);








//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
