<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenLibraryController extends Controller
{
    public function buscarLibros(Request $request)
    {
        $titulo = $request->input('titulo');

        // Llamar a Open Library
        $response = Http::get('https://openlibrary.org/search.json', [
            'title' => $titulo
        ]);

        $libros = $response->json()['docs'] ?? [];

        return response()->json($libros);
    }
}
