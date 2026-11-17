@extends('layouts.app')

@section('content')
    <h1>LISTAR APRENDICES</h1>

    <div class="container">
        <form method="GET" action="{{ route('apprentice.index') }}" class="row g-2 mb-3" data-table-filter="#idApprentice">
            <div class="col-md-8">
                <input type="search" name="search" class="form-control" placeholder="Buscar por nombre, correo, teléfono, curso o computador" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('apprentice.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('apprentice.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Aprendiz
            </a>
        </div>
        <table id="idApprentice" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Curso</th>
                    <th>Computadora</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($apprentices as $apprentice)
                    <tr>
                        <td>{{ $apprentice->name }}</td>
                        <td>{{ $apprentice->email }}</td>
                        <td>{{ $apprentice->cell_number }}</td>
                        <td>{{ data_get($apprentice, 'course.course_number', 'N/A') }}</td>
                        <td>{{ data_get($apprentice, 'computer.number', 'N/A') }}</td>
                        <td>
                            @if ($apprentice->imagen_url)
                                <img
                                    src="{{ $apprentice->imagen_url }}"
                                    alt="Imagen del aprendiz"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                           
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('apprentice.show', $apprentice->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar aprendiz?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay aprendices registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection