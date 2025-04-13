@extends('layouts.layouts')

@section('title', 'Pagina Principal')

@section('content')
    <div class="text-center mt-5">
        <img src="{{ asset('1.PNG') }}" alt="Logo de la empresa" class="img-fluid" style="max-width: 250px;">
        <h1 class="mt-4">Bienvenidos</h1>
        <p>Usa el menú de navegación para acceder a las secciones.</p>
    </div>
@endsection
