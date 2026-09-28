@extends('layouts.app')

@section('content')
    <h1>DETALLE CENTRO DE FORMACIÓN</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $training_center->id }}</p>
            <p><strong>Nombre:</strong> {{ $training_center->name }}</p>
            <p><strong>Ubicación:</strong> {{ $training_center->location }}</p>
            <a href="{{ route('training_center.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
