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


Route::group(['middleware' => ['admin','auth']], function () {
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
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
