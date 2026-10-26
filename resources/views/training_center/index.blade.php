@extends('layouts.app')

@section('content')
    <h1>LISTAR CENTROS DE FORMACIÓN</h1>

    <div class="container">
        <form method="GET" action="{{ route('training_center.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, ubicación o ID" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('training_center.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <div class="mb-3">
            <a href="{{ route('training_center.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Centro
            </a>
        </div>
        <table id="idTrainingCenter" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($training_centers as $training_center)
                    <tr>
                        <td>{{ $training_center->name }}</td>
                        <td>{{ $training_center->location }}</td>
                        <td>
                            @if ($training_center->urlFoto)
                                <img
                                    src="{{ asset('storage/images/' . $training_center->urlFoto) }}"
                                    alt="Imagen del centro"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('training_center.show', $training_center->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('training_center.edit', $training_center->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('training_center.destroy', $training_center->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar centro?')">
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