@extends('layouts.layouts')

@section('title', 'Crear Libro')

@section('content')
    <div class="container">
        <h1>Crear Libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libros.store') }}" method="POST">
            @csrf

            <div class="form-group mb-3">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="editorial">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="form-control" value="{{ old('editorial') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
