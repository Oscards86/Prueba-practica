@extends('layouts.layouts')

@section('title', 'Listado de Libros')

@section('content')
    <div class="container">
        <h1>Libros</h1>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Nuevo Libro</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->editorial }}</td>
                        <td>
                            <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('libros.destroy', $libro) }}" method="POST" style="display:inline;">
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
