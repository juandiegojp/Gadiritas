<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['admin', 'auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');

    // Usuarios
    Route::get('/usuarios', [AdminController::class, 'usuarios'])->name('admin.usuarios');
    Route::get('/usuarios/create', [AdminController::class, 'usuariosForm'])->name('admin.usuariosCreate');
    Route::post('/usuarios/create', [AdminController::class, 'storeUsuarios'])->name('admin.storeUsuarios');
    Route::get('/usuarios/detalles/{usuario}', [AdminController::class, 'datellesUsuario'])->name('admin.datellesUsuario');
    Route::get('/usuarios/{usuario}/edit', [AdminController::class, 'editarUsuario'])->name('admin.editarUsuario');
    Route::put('/usuarios/{usuario}/edit', [AdminController::class, 'updateUsuario'])->name('admin.updateUsuario');
    Route::delete('/usuarios/{usuario}/delete', [AdminController::class, 'borrarUsuario'])->name('admin.borrarUsuario');

    // Guias
    Route::get('/guias', [AdminController::class, 'guias'])->name('admin.guias');
    Route::get('/guias/create', [AdminController::class, 'guiasForm'])->name('admin.guiasCreate');
    Route::post('/guias/create', [AdminController::class, 'storeGuias'])->name('admin.storeGuias');
    Route::get('/guias/detalles/{guia}', [AdminController::class, 'datellesGuia'])->name('admin.datellesGuia');
    Route::get('/guias/{guia}/edit', [AdminController::class, 'editarGuia'])->name('admin.editarGuia');
    Route::put('/guias/{guia}/edit', [AdminController::class, 'updateGuia'])->name('admin.updateGuia');
    Route::delete('/guias/{guia}/delete', [AdminController::class, 'borrarGuia'])->name('admin.borrarGuia');

    // Destinos
    Route::get('/destinos', [AdminController::class, 'destinos'])->name('admin.destinos');
    Route::get('/destinos/create', [AdminController::class, 'destinosForm'])->name('admin.destinosCreate');
    Route::post('/destinos/create', [AdminController::class, 'storeDestinos'])->name('admin.storeDestinos');
    //Route::get('/destinos/detalles/{destino}', [AdminController::class, 'datellesDestino'])->name('admin.datellesDestino');
    Route::get('/destinos/{destino}/edit', [AdminController::class, 'editarDestino'])->name('admin.editarDestino');
    Route::put('/destinos/{destino}/edit', [AdminController::class, 'updateDestino'])->name('admin.updateDestino');
    Route::delete('/destino/delete', [AdminController::class, 'borrarDestino'])->name('admin.borrarDestino');

    // Actividades
    Route::get('/actividades', [AdminController::class, 'actividades'])->name('admin.actividades');
    Route::get('/actividades/create', [AdminController::class, 'actividadesForm'])->name('admin.actividadesCreate');
    Route::post('/actividades/create', [AdminController::class, 'storeActividades'])->name('admin.storeActividades');
    Route::get('/actividades/detalles/{actividad}', [AdminController::class, 'datellesActividad'])->name('admin.datellesActividad');
    Route::get('/actividades/{actividad}/edit', [AdminController::class, 'editarActividad'])->name('admin.editarActividad');
    Route::put('/actividades/{actividad}/edit', [AdminController::class, 'updateActividad'])->name('admin.updateActividad');
    Route::delete('/actividades/{actividad}/delete', [AdminController::class, 'borrarActividad'])->name('admin.borrarActividad');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
