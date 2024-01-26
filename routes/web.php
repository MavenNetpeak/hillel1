<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DeliveryController;

Route::get('/delivery', [DeliveryController::class, 'calculate']);



use App\Http\Controllers\StrategyController;

Route::get('/strategy', [StrategyController::class, 'index']);
