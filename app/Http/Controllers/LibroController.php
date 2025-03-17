<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('autores')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::all();
        return view('libros.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autores' => 'required|array'
        ]);

        $libro = Libro::create(['titulo' => $request->titulo]);
        $libro->autores()->attach($request->autores);

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        return view('libros.edit', compact('libro', 'autores'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autores' => 'required|array'
        ]);

        $libro->update(['titulo' => $request->titulo]);
        $libro->autores()->sync($request->autores);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->autores()->detach();
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
