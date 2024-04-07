<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('index/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('user_master/', [App\Http\Controllers\HomeController::class, 'user_master'])->name('user_master');
Route::get('client_master/', [App\Http\Controllers\HomeController::class, 'client_master'])->name('client_master');
Route::get('insurance_master/', [App\Http\Controllers\HomeController::class, 'insurance_master'])->name('insurance_master');
Route::get('bonds_master/', [App\Http\Controllers\HomeController::class, 'bonds_master'])->name('bonds_master');
Route::get('life_master/', [App\Http\Controllers\HomeController::class, 'life_master'])->name('life_master');
Route::get('medical_master/', [App\Http\Controllers\HomeController::class, 'medical_master'])->name('medical_master');
Route::get('general_master/', [App\Http\Controllers\HomeController::class, 'general_master'])->name('general_master');
Route::get('bond_user_entry_master/', [App\Http\Controllers\HomeController::class, 'bond_user_entry_master'])->name('bond_user_entry_master');
Route::get('mf_master/', [App\Http\Controllers\HomeController::class, 'mf_master'])->name('mf_master');
Route::get('data_to_import_master/', [App\Http\Controllers\HomeController::class, 'data_to_import_master'])->name('data_to_import_master');
Route::get('report1_master/', [App\Http\Controllers\HomeController::class, 'report1_master'])->name('report1_master');
Route::get('report2_master/', [App\Http\Controllers\HomeController::class, 'report2_master'])->name('report2_master');

Route::get('user_dashboard/{id}', [App\Http\Controllers\HomeController::class, 'user_dashboard'])->name('user_dashboard');

Route::get('/getschemeReport', [App\Http\Controllers\ApiController::class, 'getschemeReport'])->name('getschemeReport');

Route::get('/calculateFund/{id}', [App\Http\Controllers\ApiController::class, 'calculateFund'])->name('calculateFund');
Route::get('/calculateBond/{id}', [App\Http\Controllers\ApiController::class, 'calculateBond'])->name('calculateBond');
Route::get('/recalculate', [App\Http\Controllers\ApiController::class, 'recalculate'])->name('recalculate');