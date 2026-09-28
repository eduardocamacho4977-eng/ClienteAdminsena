@extends('layouts.app')

@section('content')
    <h1>DETALLE CURSO</h1>

    <div class="container">
        <div class="card p-4">
            <p><strong>Id:</strong> {{ $course->id }}</p>
            <p><strong>Número de curso:</strong> {{ $course->course_number }}</p>
            <p><strong>Día:</strong> {{ $course->day }}</p>
            <p><strong>Área Id:</strong> {{ $course->area_id }}</p>
            <p><strong>Área:</strong> {{ $course->area->name ?? 'N/A' }}</p>
            <p><strong>Centro Id:</strong> {{ $course->training_center_id }}</p>
            <p><strong>Centro:</strong> {{ $course->trainingCenter->name ?? 'N/A' }}</p>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@endsection
