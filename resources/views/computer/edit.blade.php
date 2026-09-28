@extends('layouts.app')

@section('content')
    <h1>Editar Computadora</h1>

    <div class="container">
        <form action="{{ route('computer.update', $computer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="text" name="number" class="form-control" value="{{ $computer->number }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" value="{{ $computer->brand }}">
            </div>
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
