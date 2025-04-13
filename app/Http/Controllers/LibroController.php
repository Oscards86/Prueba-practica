<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all(); // ← Esto obtiene todos los libros
        return view('libros.index', compact('libros')); // ← Esto los pasa a la vista
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|unique:libros,titulo',
            'autor' => 'required',
            'editorial' => 'required',
        ]);

        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|unique:libros,titulo,' . $libro->id,
            'autor' => 'required',
            'editorial' => 'required',
        ]);

        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
