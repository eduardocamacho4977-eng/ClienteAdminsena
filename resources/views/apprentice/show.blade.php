@extends('layouts.app')

@section('content')
    <h1>DETALLE APRENDIZ</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $apprentice->id }}</p>
            <p><strong>Nombre:</strong> {{ $apprentice->name }}</p>
            <p><strong>Correo:</strong> {{ $apprentice->email }}</p>
            <p><strong>Teléfono:</strong> {{ $apprentice->cell_number }}</p>
            <p><strong>Curso Id:</strong> {{ $apprentice->course_id }}</p>
            <p><strong>Curso:</strong> {{ $apprentice->course->course_number ?? 'N/A' }}</p>
            <p><strong>Computadora Id:</strong> {{ $apprentice->computer_id }}</p>
            <p><strong>Computadora:</strong> {{ $apprentice->computer->brand ?? 'N/A' }}</p>
            <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
