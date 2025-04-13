<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
     $clientes = Cliente::all();
     return view('clientes.index', compact('clientes'));
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'telefono' => 'required',
        ]);
    
        Cliente::create($request->only(['nombre', 'email', 'telefono']));
    
        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente.');
    }
    

    public function edit(Cliente $cliente){
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente) {
        $request->validate([
         'nombre' => 'required',
         'email' => 'required|email|unique:clientes,email,' . $cliente->id,
         'telefono' => 'required|unique:clientes,telefono,' . $cliente->id,
        ]);

      $cliente->update($request->all());
      return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente){
      $cliente->delete();
      return redirect()->route('clientes.index');
    }

}
