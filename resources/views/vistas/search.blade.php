@extends('layouts.app')

@section('content')

<div class="container py-4">
    <h2 class="mb-4 fw-bold" style="color: #00A651;">Resultados de Búsqueda</h2>

    @if($search == '')
        <div class="alert alert-info border-0 shadow-sm">
            Escribe algo en el buscador.
        </div>
    @else

        <p class="text-muted fs-5 mb-4">
            Resultados para: <strong class="text-dark">{{ $search }}</strong>
        </p>

        {{-- CURSOS --}}
        @if(count($courses) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Cursos</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($courses as $course)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Ficha/Número:</strong> {{ $course->course_number }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- INSTRUCTORES --}}
        @if(count($teachers) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Instructores</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($teachers as $teacher)
                    <div class="list-group-item">
                        {{ $teacher->name }}
                    </div>
                @endforeach
            </div>
        @endif

        {{-- APRENDICES --}}
        @if(count($apprentices) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Aprendices</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($apprentices as $apprentice)
                    <div class="list-group-item">
                        {{ $apprentice->name }}
                    </div>
                @endforeach
            </div>
        @endif

        {{-- ÁREAS --}}
        @if(count($areas) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Áreas</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($areas as $area)
                    <div class="list-group-item">
                        {{ $area->name }}
                    </div>
                @endforeach
            </div>
        @endif

        {{-- CENTROS --}}
        @if(count($trainingCenters) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Centros</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($trainingCenters as $center)
                    <div class="list-group-item">
                        {{ $center->name }}
                    </div>
                @endforeach
            </div>
        @endif

        {{-- COMPUTADORES --}}
        @if(count($computers) > 0)
            <h4 class="mt-4 fw-bold" style="color: #00A651;">Computadores</h4>
            <div class="list-group mb-3 shadow-sm">
                @foreach($computers as $computer)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <span><strong>Número de Equipo:</strong> {{ $computer->number }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- SIN RESULTADOS --}}
        @if(
            count($courses) == 0 &&
            count($teachers) == 0 &&
            count($apprentices) == 0 &&
            count($areas) == 0 &&
            count($trainingCenters) == 0 &&
            count($computers) == 0
        )
            <div class="alert alert-warning mt-4 border-0 shadow-sm">
                No se encontraron resultados para "<strong>{{ $search }}</strong>".
            </div>
        @endif

    @endif

</div>

@endsection