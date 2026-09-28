@extends('layouts.app')

@section('content')
    <h1>LISTAR COMPUTADORAS</h1>

    <div class="container">
        <form method="GET" action="{{ route('computer.index') }}" class="row g-2 mb-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por número, marca o ID" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('computer.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>
        <table id="idComputer" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Marca</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $computer)
                    <tr>
                        <td>{{ $computer->number }}</td>
                        <td>{{ $computer->brand }}</td>
                        <td>
                            @if ($computer->urlFoto)
                                <img
                                    src="{{ asset('storage/images/' . $computer->urlFoto) }}"
                                    alt="Imagen de la computadora"
                                    width="80"
                                    height="80"
                                    style="object-fit: cover; border-radius: 5px;"
                                >
                           
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('computer.show', $computer->id) }}" class="btn btn-sm btn-primary">mostrar</a>
                            <a href="{{ route('computer.edit', $computer->id) }}" class="btn btn-sm btn-secondary">editar</a>
                            <form action="{{ route('computer.destroy', $computer->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Eliminar computadora?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mb-3">
            <a href="{{ route('computer.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nueva Computadora
            </a>
        </div>
    </div>
@endsection