@extends('layouts.app')

@section('content')

    <h1>Crear Área</h1>

    <div class="container">
        <form action="{{ route('area.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>
             <br>
           <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="urlFoto" class="form-control-file" accept="image/*">
            </div>


            <button type="submit" class="btn btn-primary">Crear Área</button>
            <a href="{{ route('area.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>

    @endsection


