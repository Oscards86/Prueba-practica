@extends('layouts.layouts')

@section('title', 'Crear Libro')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Libro</h1>

        {{-- Mostrar errores generales --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario para crear libro --}}
        <form action="{{ route('libros.store') }}" method="POST">
            @csrf

            {{-- Campo Título --}}
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo') }}" required>
                @error('titulo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo Autor --}}
            <div class="form-group mt-3">
                <label for="autor">Autor</label>
                <input type="text" name="autor" id="autor" class="form-control @error('autor') is-invalid @enderror" value="{{ old('autor') }}" required maxlength="40" title="Máximo 40 caracteres.">
                @error('autor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo Editorial --}}
            <div class="form-group mt-3">
                <label for="editorial">Editorial</label>
                <input type="text" name="editorial" id="editorial" class="form-control @error('editorial') is-invalid @enderror" value="{{ old('editorial') }}" required maxlength="255" title="Máximo 255 caracteres.">
                @error('editorial')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Botones --}}
            <button type="submit" class="btn btn-success mt-3">Crear Libro</button>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection
