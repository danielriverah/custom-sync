<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GitFtpController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});



Route::get('/git-ftp', [GitFtpController::class, 'index']);

/**
 * Rutas para el panel de administración.
 */
Route::prefix('admin')->name('admin.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('proyectos', App\Http\Controllers\Admin\ProyectoController::class);
    Route::resource('proyectos.modulos', App\Http\Controllers\Admin\ModuloController::class);
    Route::resource('modulos.submodulos', App\Http\Controllers\Admin\SubmoduloController::class);
    Route::resource('modulos.documentos', App\Http\Controllers\Admin\DocumentoController::class);
    Route::resource('documentos.recursos', App\Http\Controllers\Admin\RecursoController::class);
    Route::get('proyectos/{proyecto}/configuracion', [App\Http\Controllers\Admin\ConfiguracionController::class, 'edit'])->name('configuracion.edit');
    Route::put('proyectos/{proyecto}/configuracion', [App\Http\Controllers\Admin\ConfiguracionController::class, 'update'])->name('configuracion.update');
});

/**
 * Ruta dinámica para visualizar la documentación.
 * /proyecto/{slug}/modulo/{modulo}/submodulo/{submodulo}/documento/{documento}
 */
Route::get('/proyecto/{proyecto:slug}/{modulo?}/{submodulo?}/{documento?}', [App\Http\Controllers\DocumentacionController::class, 'show'])
    ->name('documentacion.show');
