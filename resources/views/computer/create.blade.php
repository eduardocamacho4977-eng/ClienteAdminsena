@extends('layouts.app')

@section('content')

    <h1>Crear Computadora</h1>

    <div class="container">
        <form action="{{ route('computer.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Número</label>
                <input type="number" name="number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="urlFoto" class="form-control-file" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Crear Computadora</button>
            <a href="{{ route('computer.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
@endsection