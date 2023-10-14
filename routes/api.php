<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('continent/create', [App\Http\Controllers\ContinentController::class, 'store']);
Route::post('continent/list', [App\Http\Controllers\ContinentController::class, 'listContinent']);
Route::post('continent/show', [App\Http\Controllers\ContinentController::class, 'getcontinent']);
Route::post('continent/delete', [App\Http\Controllers\ContinentController::class, 'delete']);
Route::post('continent/update/{id}', [App\Http\Controllers\ContinentController::class, 'update']);

Route::post('country/create', [App\Http\Controllers\CountryController::class, 'store']);
Route::post('country/list', [App\Http\Controllers\CountryController::class, 'listCountry']);
Route::post('country/show', [App\Http\Controllers\CountryController::class, 'getcountry']);
Route::post('country/delete', [App\Http\Controllers\CountryController::class, 'delete']);
Route::post('country/update/{id}', [App\Http\Controllers\CountryController::class, 'update']);

Route::post('state/create', [App\Http\Controllers\StateController::class, 'store']);
Route::post('state/list', [App\Http\Controllers\StateController::class, 'liststate']);
Route::post('state/show', [App\Http\Controllers\StateController::class, 'getstate']);
Route::post('state/delete', [App\Http\Controllers\StateController::class, 'delete']);
Route::post('state/update/{id}', [App\Http\Controllers\StateController::class, 'update']);