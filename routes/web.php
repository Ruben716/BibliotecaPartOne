<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\OpenLibraryController;

Route::get('/buscar-libros', [OpenLibraryController::class, 'buscarLibros']);
Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);
