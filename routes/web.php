<?php

use App\Http\Controllers\AddformulariosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\dashboardformularios;
use App\Http\Controllers\DashboardformulariosController;
use App\Http\Controllers\PreguntasformulariosController;

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

Route::get('/forms/{id}/{nombre}', function(int $id,string $nombre){
     return view('forms', compact('id','nombre'));
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    /* RUTAS FORMULARIOS */
    Route::get('/addformulario', [AddformulariosController::class, 'index'])->name('addformulario');
    Route::get('/createformularios', [AddformulariosController::class, 'create'])->name('createformularios');

    Route::put('/preguntasformularios/{id}/{nombre}', [PreguntasformulariosController::class, 'update'])->name('editpreguntasformularios');
    Route::get('/preguntasformularios/{id}/{nombre}', function(int $id,string $nombre){
        return view('pages.formularios.preguntasformulario', compact('id','nombre'));
    });
    
    /* REDIRECCIONA A LA PAGINA DE DASHBORAD DONDE SE VAN A ESTAR CARGANDO GRAFICAS Y TABLAS CON LIVEWIRE */
    Route::get('/dashboard/{id}/{nombre}', [DashboardformulariosController::class, 'create']);

    Route::fallback(function() {
        return view('pages/utility/404');
    });    
});