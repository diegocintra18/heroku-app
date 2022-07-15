<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\IntegrationsController;
use App\Http\Controllers\Monitor\MonitorController;
use App\Http\Controllers\ZendeskController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/integracoes', [IntegrationsController::class, 'index'])->name('integrations.index');
    Route::post('/salvar-zendesk', [ZendeskController::class, 'store'])->name('zendesk.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/configurar-monitor', [MonitorController::class, 'monitorSettings'])->name('monitor.settings');
    Route::get('/configurar-monitor/regras-de-visualizacoes', [MonitorController::class, 'zendeskVisualizationRules'])->name('monitor.visualizationRules');
    Route::get('/monitor', [MonitorController::class, 'index'])->name('monitor.index');
    Route::post('/salvar-visualizacao', [MonitorController::class, 'storeZendeskVisualization'])->name('monitor.storeZendeskVisualization');
});

Route::post('/criar-cliente', [ClientsController::class, 'store'])->name('clients.store');


require __DIR__.'/auth.php';

Auth::routes();