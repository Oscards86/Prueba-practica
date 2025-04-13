<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        // Validaciones del lado del servidor
        $request->validate([
            'nombre' => 'required|max:40',
            'email' => 'required|email|max:255|unique:clientes,email',
            'telefono' => 'required|numeric|digits:8|unique:clientes,telefono',
        ], [
            'email.unique' => 'El correo electrónico ya está registrado.',
            'telefono.unique' => 'El número de teléfono ya está registrado.'
        ]);

        // Crear cliente
        Cliente::create($request->only(['nombre', 'email', 'telefono']));

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        // Validaciones del lado del servidor
        $request->validate([
            'nombre' => 'required|max:40',
            'email' => 'required|email|max:255|unique:clientes,email,' . $cliente->id,
            'telefono' => 'required|numeric|digits:8|unique:clientes,telefono,' . $cliente->id,
        ], [
            'email.unique' => 'El correo electrónico ya está registrado.',
            'telefono.unique' => 'El número de teléfono ya está registrado.'
        ]);

        // Actualizar cliente
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
