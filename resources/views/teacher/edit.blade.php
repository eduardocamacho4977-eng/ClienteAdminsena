@extends('layouts.app')

@section('content')
    <h1>Editar Profesor</h1>

    <div class="container">
        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $teacher->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" value="{{ $teacher->email }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Área Id</label>
                 <select name="area_id" class="form-select">
               @foreach ($areas as $area)
                <option value="{{ $area->id }}" {{ $teacher->area_id == $area->id ? 'selected' : '' }}>
                    {{ $area->id }} - {{ $area->name }}
                </option>
            @endforeach
        </select>
            </div>      
            <div class="mb-3">
                <label class="form-label">Centro Id</label>
                
                <select name="training_center_id" class="form-select">
                    @foreach ($training_centers as $training_center)
                        <option value="{{ $training_center->id }}" {{ $teacher->training_center_id == $training_center->id ? 'selected' : '' }}>
                            {{ $training_center->id }} - {{ $training_center->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-primary">Guardar</button>
            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
        </form>
    </div>
@endsection
