@extends('layouts.layouts')

@section('title', 'Editar Libro')

@section('content')
    <div class="container">
        <h1>Editar Libro: {{ $libro->titulo }}</h1>

        <form action="{{ route('libros.update', $libro) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required>
                @error('titulo')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" value="{{ old('autor', $libro->autor) }}" required>
                @error('autor')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="editorial">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="form-control" value="{{ old('editorial', $libro->editorial) }}" required>
                @error('editorial')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning mt-3">Actualizar Libro</button>
        </form>
    </div>
@endsection
