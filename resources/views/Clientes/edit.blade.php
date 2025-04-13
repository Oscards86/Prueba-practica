@extends('layouts.layouts')

@section('title', 'Editar Cliente')

@section('content')
    <div class="container">
        <h1>Editar Cliente: {{ $cliente->nombre }}</h1>

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

        <form action="{{ route('clientes.update', $cliente) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Campo Nombre --}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text"
                       name="nombre"
                       id="nombre"
                       class="form-control @error('nombre') is-invalid @enderror"
                       value="{{ old('nombre', $cliente->nombre) }}"
                       required
                       maxlength="40"
                       title="Máximo 40 caracteres.">
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo Email --}}
            <div class="form-group mt-3">
                <label for="email">Correo Electrónico</label>
                <input type="email"
                       name="email"
                       id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email', $cliente->email) }}"
                       required
                       maxlength="255"
                       title="Ingrese un correo válido.">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Campo Teléfono --}}
            <div class="form-group mt-3">
                <label for="telefono">Teléfono</label>
                <input type="text"
                       name="telefono"
                       id="telefono"
                       class="form-control @error('telefono') is-invalid @enderror"
                       value="{{ old('telefono', $cliente->telefono) }}"
                       required
                       pattern="[0-9]{8}"
                       maxlength="8"
                       minlength="8"
                       title="Debe ingresar exactamente 8 dígitos numéricos.">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-warning mt-4">Actualizar Cliente</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
        </form>
    </div>

    {{-- JS para asegurar entrada numérica en teléfono --}}
    <script>
        document.getElementById('telefono').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 8);
        });
    </script>
@endsection
