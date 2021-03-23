<?php


use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\RpgController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::post('/register',[ConnectionController::class, 'Register']);
Route::post('/login',[ConnectionController::class, 'Connection']);
Route::post('/newrpg',[RpgController::class, 'store']);
Route::get('/listrpg',[RpgController::class, 'index']);
Route::get('/admin/change/{id}' ,[RpgController::class, 'update']);
Route::get('/admin' ,[RpgController::class, 'admin']);



