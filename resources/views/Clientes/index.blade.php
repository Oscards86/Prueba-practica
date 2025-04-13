@extends('layouts.layouts')

@section('title', 'Listado de Clientes')

@section('content')
    <div class="container">
        <h1>Clientes</h1>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Nuevo Cliente</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
