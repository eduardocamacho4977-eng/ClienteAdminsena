@extends('layouts.app')

@section('content')
    <h1>Editar Curso</h1>

    <div class="container">
        <form action="{{ route('course.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Número de curso</label>
                <input type="text" name="course_number" class="form-control" value="{{ old('course_number', $course->course_number) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Día</label>
                <input type="text" name="day" class="form-control" value="{{ old('day', $course->day) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Área Id</label>
                 <select name="area_id" class="form-select" required>
               @foreach ($areas as $area)
                <option value="{{ $area->id }}" @selected(old('area_id', $course->area_id) == $area->id)>
                    {{ $area->id }} - {{ $area->name }}
                </option>
            @endforeach
        </select>
            </div>      
            <div class="mb-3">
                <label class="form-label">Centro Id</label>
                
                <select name="training_center_id" class="form-select" required>
                    @foreach ($training_centers as $training_center)
                        <option value="{{ $training_center->id }}" @selected(old('training_center_id', $course->training_center_id) == $training_center->id)>
                            {{ $training_center->id }} - {{ $training_center->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
