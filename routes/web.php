<?php

use App\Livewire\TablaLibros;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\librosController;
use App\Http\Controllers\prestamosController;

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
    return view('app');
});

//libros

//RUTAS PARA MOSTRAR VISTAS
Route::get('/libros',[librosController::class, 'displayBooks'])->name('displayLibros');
Route::get('/formulario-add-book',[librosController::class, 'AddBook']);
Route::get('/edit-libro/{id}',[librosController::class, 'viewEditLibro']);
Route::get('/detalles-libro/{id}',[librosController::class, 'viewDetallesLibro']);

//RUTA QUE MANEJAN DATOS
Route::post('/add-libro', [librosController::class, 'addLibro'])->name('addLibro');

Route::get('/delete-libro/{id}', [librosController::class, 'deleteBook']);

Route::post('/update-libro', [librosController::class, 'updateLibro'])->name('updateLibro');

Route::post('/buscar-libro', [librosController::class, 'searchBook'])->name('searchBook');

//PRESTAMOS

Route::get('/prestamos',[prestamosController::class, 'displayPrestamos'])->name('displayPrestamos');

//MOSTRAMOS LA VISTA DE FORMULARIO PARA REALIZAR UN PRESTAMO
Route::get('/formulario-add-prestamo/{id}',[prestamosController::class, 'displayFormPrestamo']);
Route::post('/realizar-prestamo', [prestamosController::class, 'realizarPrestamo'])->name('realizarPrestamo');
