<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::all(); // Obtener todos los libros
        return view('libros.index', compact('libros')); // Pasar los libros a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones del lado del servidor
        $request->validate([
            'titulo' => 'required|unique:libros,titulo', // Titulo único
            'autor' => 'required|max:40', // Longitud del autor
            'editorial' => 'required|max:255', // Longitud del editorial
        ], [
            'titulo.unique' => 'Este título ya está registrado. Por favor ingrese otro título.',
            'autor.max' => 'El autor no debe tener más de 40 caracteres.',
            'editorial.max' => 'La editorial no debe tener más de 255 caracteres.',
        ]);

        // Crear el libro
        Libro::create($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        // Validaciones del lado del servidor
        $request->validate([
            'titulo' => 'required|unique:libros,titulo,' . $libro->id, // Titulo único excluyendo el actual
            'autor' => 'required|max:40', // Longitud del autor
            'editorial' => 'required|max:255', // Longitud del editorial
        ], [
            'titulo.unique' => 'Este título ya está registrado. Por favor ingrese otro título.',
            'autor.max' => 'El autor no debe tener más de 40 caracteres.',
            'editorial.max' => 'La editorial no debe tener más de 255 caracteres.',
        ]);

        // Actualizar el libro
        $libro->update($request->all());

        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        // Eliminar el libro
        $libro->delete();
        return redirect()->route('libros.index')->with('success', 'Libro eliminado correctamente.');
    }
}
