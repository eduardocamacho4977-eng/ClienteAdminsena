
@extends('layouts.app')

@section('content')
    <h1>Crear Aprendiz</h1>

    <div class="container">
        <form action="{{ route('apprentice.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Celular</label>
                <input type="number" name="cell_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Curso</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="">Seleccione un curso</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->course_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="computer_id" class="form-label">Computador</label>
                <select name="computer_id" id="computer_id" class="form-select" required>
                    <option value="">Seleccione un computador</option>
                    @foreach($computers as $computer)
                        <option value="{{ $computer->id }}">{{ $computer->number }}</option>
                    @endforeach
                </select>        
            </div>
              <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="urlFoto" class="form-control-file" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Crear Aprendiz</button>
            <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
@endsection