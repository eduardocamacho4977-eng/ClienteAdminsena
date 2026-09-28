@extends('layouts.app')

@section('content')
    <h1>Editar Aprendiz</h1>

    <div class="container">
        <form action="{{ route('apprentice.update', $apprentice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $apprentice->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" value="{{ $apprentice->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="cell_number" class="form-control" value="{{ $apprentice->cell_number }}">
            </div>
          
                <label class="form-label">Curso</label>

                <select name="course_id" class="form-select">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ $apprentice->course_id == $course->id ? 'selected' : '' }}>
                            {{ $course->id }} - {{ $course->course_number }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Computadora</label>
           <select name="computer_id" class="form-select">
            @foreach ($computers as $computer)
                <option value="{{ $computer->id }}" {{ $apprentice->computer_id == $computer->id ? 'selected' : '' }}>
                    {{ $computer->id }} - {{ $computer->number }}
                </option>
            @endforeach
        </select>
            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('apprentice.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
