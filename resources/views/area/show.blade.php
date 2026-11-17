@extends('layouts.app')

@section('content')
    <h1>DETALLE ÁREA</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $area->id }}</p>
            <p><strong>Nombre:</strong> {{ $area->name }}</p>
            @if ($area->imagen_url)
                <img src="{{ $area->imagen_url }}" alt="Imagen del área" class="img-fluid rounded mb-3" style="max-width: 240px;">
            @endif
            <a href="{{ route('area.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
