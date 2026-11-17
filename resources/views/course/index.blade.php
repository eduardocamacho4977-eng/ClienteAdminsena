@extends('layouts.app')

@section('content')
    <h1>LISTAR CURSOS</h1>

    <div class="container">
        <form method="GET" action="{{ route('course.index') }}" class="row g-2 mb-3" data-table-filter="#idCourse">
            <div class="col-md-8">
                <input type="search" name="search" class="form-control" placeholder="Buscar por número, día, ID o área/centro" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('course.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('course.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Curso
            </a>
        </div>
        <table id="idCourse" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Número de curso</th>
                    <th>Día</th>
                    <th>Área</th>
                    <th>Centro</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->course_number }}</td>
                        <td>{{ $course->day }}</td>
                        <td>{{ data_get($course, 'area.name', 'N/A') }}</td>
                        <td>{{ data_get($course, 'trainingCenter.name', 'N/A') }}</td>
                        <td>
                            @if ($course->imagen_url)
                                <img
                                    src="{{ $course->imagen_url }}"
                                    alt="Imagen del curso"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                           
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('course.show', $course->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('course.destroy', $course->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar este curso?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay cursos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection