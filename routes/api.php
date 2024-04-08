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

Route::post('user/create', [App\Http\Controllers\ApiController::class, 'addUser']);
Route::post('user/list', [App\Http\Controllers\ApiController::class, 'listUser']);
Route::post('user/show', [App\Http\Controllers\ApiController::class, 'getUser']);
Route::post('user/delete', [App\Http\Controllers\ApiController::class, 'deleteUser']);
Route::post('user/update/{id}', [App\Http\Controllers\ApiController::class, 'updateUser']);

Route::post('client/create', [App\Http\Controllers\ApiController::class, 'addClient']);
Route::post('client/list', [App\Http\Controllers\ApiController::class, 'listClient']);
Route::post('client/show', [App\Http\Controllers\ApiController::class, 'getClient']);
Route::post('client/delete', [App\Http\Controllers\ApiController::class, 'deleteClient']);
Route::post('client/update/{id}', [App\Http\Controllers\ApiController::class, 'updateClient']);

Route::post('insurer_master/create', [App\Http\Controllers\ApiController::class, 'addinsurer_master']);
Route::post('insurer_master/show', [App\Http\Controllers\ApiController::class, 'getinsurer_master']);
Route::post('insurer_master/delete', [App\Http\Controllers\ApiController::class, 'deleteinsurer_master']);
Route::post('insurer_master/update/{id}', [App\Http\Controllers\ApiController::class, 'updateinsurer_master']);

Route::post('scheme_master/create', [App\Http\Controllers\ApiController::class, 'addscheme_master']);
Route::post('scheme_master/list', [App\Http\Controllers\ApiController::class, 'listscheme_master']);
Route::post('scheme_master/show', [App\Http\Controllers\ApiController::class, 'getscheme_master']);
Route::post('scheme_master/delete', [App\Http\Controllers\ApiController::class, 'deletescheme_master']);
Route::post('scheme_master/update/{id}', [App\Http\Controllers\ApiController::class, 'updatescheme_master']);

Route::post('mutual_fund/create', [App\Http\Controllers\ApiController::class, 'addmutual_fund']);
Route::post('mutual_fund/list', [App\Http\Controllers\ApiController::class, 'listmutual_fund']);
Route::post('mutual_fund/show', [App\Http\Controllers\ApiController::class, 'getmutual_fund']);
Route::post('mutual_fund/delete', [App\Http\Controllers\ApiController::class, 'deletemutual_fund']);
Route::post('mutual_fund/update/{id}', [App\Http\Controllers\ApiController::class, 'updatemutual_fund']);
Route::post('getmutualCount', [App\Http\Controllers\ApiController::class, 'getmutualCount']);

Route::post('getamc', [App\Http\Controllers\ApiController::class, 'getamc']);
Route::post('getamc_plan', [App\Http\Controllers\ApiController::class, 'getamc_plan']);

Route::post('importTransaction', [App\Http\Controllers\ApiController::class, 'importTransaction']);
Route::post('listImportTransaction', [App\Http\Controllers\ApiController::class, 'listImportTransaction']);
Route::post('deleteTransaction', [App\Http\Controllers\ApiController::class, 'deleteTransaction']);

Route::post('getlife_insurance', [App\Http\Controllers\ApiController::class, 'getlife_insurance']);
Route::post('listlife_insurance', [App\Http\Controllers\ApiController::class, 'listlife_insurance']);

Route::post('listhealth_insurance', [App\Http\Controllers\ApiController::class, 'listhealth_insurance']);
Route::post('gethealth_insurance', [App\Http\Controllers\ApiController::class, 'gethealth_insurance']);

Route::post('getbonds', [App\Http\Controllers\ApiController::class, 'getbonds']);
Route::post('listbonds', [App\Http\Controllers\ApiController::class, 'listbonds']);
Route::post('getbondCount', [App\Http\Controllers\ApiController::class, 'getbondCount']);

Route::post('getdashboard_count', [App\Http\Controllers\ApiController::class, 'getdashboard_count']);