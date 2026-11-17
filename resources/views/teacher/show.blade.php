@extends('layouts.app')

@section('content')
    <h1>DETALLE PROFESOR</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $teacher->id }}</p>
            <p><strong>Nombre:</strong> {{ $teacher->name }}</p>
            <p><strong>Correo:</strong> {{ $teacher->email }}</p>
            <p><strong>Área Id:</strong> {{ $teacher->area_id }}</p>
            <p><strong>Área:</strong> {{ data_get($teacher, 'area.name', 'N/A') }}</p>
            <p><strong>Centro Id:</strong> {{ $teacher->training_center_id }}</p>
            <p><strong>Centro:</strong> {{ data_get($teacher, 'trainingCenter.name', 'N/A') }}</p>
            @if ($teacher->imagen_url)
                <img src="{{ $teacher->imagen_url }}" alt="Imagen del profesor" class="img-fluid rounded mb-3" style="max-width: 240px;">
            @endif
            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
