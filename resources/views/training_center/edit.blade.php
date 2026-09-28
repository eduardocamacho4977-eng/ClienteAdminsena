@extends('layouts.app')

@section('content')
    <h1>Editar Centro</h1>

    <div class="container">
        <form action="{{ route('training_center.update', $training_center->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $training_center->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ubicación</label>
                <input type="text" name="location" class="form-control" value="{{ $training_center->location }}">
            </div>
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('training_center.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
