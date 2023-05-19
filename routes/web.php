<?php

use App\Http\Controllers\AddformulariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [AddformulariosController::class, 'indexmain'])->name('index');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    
    Route::get('/addformulario', [AddformulariosController::class, 'index'])->name('addformulario');
    Route::get('/createformularios', [AddformulariosController::class, 'create'])->name('createformularios');

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});