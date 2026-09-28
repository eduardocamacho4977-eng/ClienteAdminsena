@extends('layouts.app')

@section('content')

    <h1>Crear Centro de Formación</h1>

    <div class="container">
        <form action="{{ route('training_center.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ubicación</label>
                <input type="text" name="location" class="form-control" required>
            </div>
              <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="urlFoto" class="form-control-file" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Crear Centro</button>
            <a href="{{ route('training_center.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>

@endsection