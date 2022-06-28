<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/integracoes', [IntegrationsController::class, 'index'])->name('integrations.index')->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::post('/salvar-zendesk', [ZendeskController::class, 'store'])->name('zendesk.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/configurar-monitor', [MonitorController::class, 'monitorSettings'])->name('monitor.settings');
});


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
