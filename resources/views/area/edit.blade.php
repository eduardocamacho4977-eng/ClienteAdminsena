@extends('layouts.app')

@section('content')
    <h1>Editar Área</h1>

    <div class="container">
        <form action="{{ route('area.update', $area->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $area->name) }}" required>
            </div>
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('area.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
