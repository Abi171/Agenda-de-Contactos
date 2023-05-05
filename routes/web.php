<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\EventosController;
use App\Models\Contacto;
use App\Models\Nota;
use App\Models\Evento;

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

// RITAS PARA EL MODELO DE CONTACTO

// ruta para ver la tabla de estudiantes
Route::get('/contactos', [ContactosController::class, 'index'])
->name('contactos.index');

// Ruta para ver cada contacto
Route::get('/contactos/{id}', [ContactosController::class, 'show'])
->name('contactos.mostrar')->where('id','[0-9]+');

//Ruta para mostrar fomurlario de crear contacto
Route::get('/contactos/crear', [ContactosController::class, 'create'])
->name('contactos.crear');

//Ruta que va a recibir el formulario de crear
Route::post('/contactos/crear', [ContactosController::class, 'store'])
->name('contactos.guardar');

// ruta para mostrar formulario de edición
Route::get('/contactos/{id}/editar', [ContactosController::class, 'edit'])
->name('contactos.edit')->where('id','[0-9]+');

Route::put('/contactos/{id}/editar', [ContactosController::class, 'update'])
->name('contactos.update')->where('id','[0-9]+');

Route::delete('/contactos/{id}/borrar', [ContactosController::class, 'destroy'])
->name('contactos.borrar')->where('id', '[0-9]+');

// RUTAS PARA MODELO NOTA

Route::get('/notas', [NotasController::class, 'indexN'])
->name('notas.index');

Route::get('/notas/{id}', [NotasController::class, 'showN'])
->name('notas.mostrar')->where('id','[0-9]+');

Route::get('/notas/crear', [NotasController::class, 'createN'])
->name('notas.crear');

Route::post('/notas/crear', [NotasController::class, 'storeN'])
->name('notas.guardar');

Route::get('/notas/{id}/editar', [NotasController::class, 'editN'])
->name('notas.edit')->where('id','[0-9]+');

Route::put('/notas/{id}/editar', [NotasController::class, 'updateN'])
->name('notas.update')->where('id','[0-9]+');

Route::delete('/notas/{id}/borrar', [NotasController::class, 'destroyN'])
->name('notas.borrar')->where('id', '[0-9]+');

// RUTAS PARA MODELO EVENTO
Route::get('/eventos', [EventosController::class, 'indexE'])
->name('eventos.index');

Route::get('/eventos/{id}', [EventosController::class, 'showE'])
->name('eventos.mostrar')->where('id','[0-9]+');

Route::get('/eventos/crear', [EventosController::class, 'createE'])
->name('eventos.crear');

Route::post('/eventos/crear', [EventosController::class, 'storeE'])
->name('eventos.guardar');

Route::get('/eventos/{id}/editar', [EventosController::class, 'editE'])
->name('eventos.edit')->where('id','[0-9]+');

Route::put('/eventos/{id}/editar', [EventosController::class, 'updateE'])
->name('eventos.update')->where('id','[0-9]+');

Route::delete('/eventos/{id}/borrar', [EventosController::class, 'destroyE'])
->name('eventos.borrar')->where('id', '[0-9]+');


