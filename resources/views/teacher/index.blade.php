@extends('layouts.app')

@section('content')
    <h1>LISTAR PROFESORES</h1>

    <div class="container">
        <form method="GET" action="{{ route('teacher.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, email, ID o área/centro" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('teacher.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('teacher.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Profesor
            </a>
        </div>
        <table id="idTeacher" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  
                    <th>Nombre</th>
                    <th>Correo</th>               
                    <th>Centro</th>         
                    <th>Área</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                    
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->trainingCenter->name ?? 'N/A' }}</td>
                        <td>{{ $teacher->area->name ?? 'N/A' }}</td>
                        <td>
                            @if ($teacher->urlFoto)
                                <img
                                    src="{{ asset('storage/images/' . $teacher->urlFoto) }}"
                                    alt="Imagen del profesor"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar profesor?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection