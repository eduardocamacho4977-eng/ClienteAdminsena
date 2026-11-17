@extends('layouts.app')

@section('content')
    <h1>DETALLE COMPUTADORA</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $computer->id }}</p>
            <p><strong>Número:</strong> {{ $computer->number }}</p>
            <p><strong>Marca:</strong> {{ $computer->brand }}</p>
            @if ($computer->imagen_url)
                <img src="{{ $computer->imagen_url }}" alt="Imagen de la computadora" class="img-fluid rounded mb-3" style="max-width: 240px;">
            @endif
            <a href="{{ route('computer.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
