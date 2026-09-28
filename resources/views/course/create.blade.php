@extends('layouts.app')

@section('content')

    <h1>Crear Curso</h1>

    <div class="container">
        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label">Número de Curso</label>
                <input type="number" name="course_number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Día</label>
                <input type="text" name="day" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Área</label>
                <select name="area_id" id="area_id" class="form-select" required>
                    <option value="">Seleccione un área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Centro de Formación</label>
                <select name="training_center_id" id="training_center_id" class="form-select" required>
                    <option value="">Seleccione un centro de formación</option>
                    @foreach($training_centers as $training_center)
                        <option value="{{ $training_center->id }}">{{ $training_center->name }}</option>
                    @endforeach
                </select>
            </div>
              <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="urlFoto" class="form-control-file" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Crear Curso</button>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancelar</a>

        </form>
    </div>
@endsection