@extends('layouts.app')

@section('content')
    <h1>LISTAR ÁREAS</h1>

    <div class="container">
        <form method="GET" action="{{ route('area.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o ID" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('area.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('area.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nueva Área
            </a>
        </div>
        <table id="idArea" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($areas->unique('name') as $area)
                    <tr>
                        <td>{{ $area->name }}</td>
                        <td>
                            @if ($area->urlFoto)
                                <img
                                    src="{{ asset('storage/images/' . $area->urlFoto) }}"
                                    alt="Imagen del área"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                           
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('area.show', $area->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('area.edit', $area->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('area.destroy', $area->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar área? Esto borrará {{ $area->courses->count() }} curso(s) y {{ $area->teachers->count() }} profesor(es) relacionados.')">
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