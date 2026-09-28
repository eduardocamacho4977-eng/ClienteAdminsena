@extends('layouts.app')

@section('content')
    <h1>DETALLE PROFESOR</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $teacher->id }}</p>
            <p><strong>Nombre:</strong> {{ $teacher->name }}</p>
            <p><strong>Correo:</strong> {{ $teacher->email }}</p>
            <p><strong>Área Id:</strong> {{ $teacher->area_id }}</p>
            <p><strong>Área:</strong> {{ $teacher->area->name ?? 'N/A' }}</p>
            <p><strong>Centro Id:</strong> {{ $teacher->training_center_id }}</p>
            <p><strong>Centro:</strong> {{ $teacher->trainingCenter->name ?? 'N/A' }}</p>
            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
