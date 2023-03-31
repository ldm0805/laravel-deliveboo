<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RestaurateurController as RestaurateurController;
use App\Http\Controllers\Api\MyCheckController as MyCheckController;
use App\Http\Controllers\Api\TypeController as TypeController;



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

Route::get('/restaurateurs', [RestaurateurController::class, 'index']);
Route::get('/restaurateurs/{slug}', [RestaurateurController::class, 'show']);
Route::get('/types', [TypeController::class, 'index']);
Route::get('/types/{slug}', [TypeController::class, 'show']);
Route::get('/typestwo/{slug}', [TypeController::class, 'showTwo']);


Route::middleware('auth:api')->group(function() {
	
});


Route::get('mycheck/pages', 'MyCheckController@index');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
