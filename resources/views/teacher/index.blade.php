<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Profesores</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="mb-4 text-center">LISTAR PROFESORES</h1>

        <form method="GET" action="{{ route('teacher.index') }}" class="row g-2 mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, email, ID o área/centro" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="{{ route('teacher.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>

        <div class="mb-3">
            <a href="{{ route('teacher.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Profesor
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="idTeacher" class="table table-striped table-hover mb-0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Centro</th>
                            <th>Área</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($teachers) && count($teachers) > 0)
                            @foreach ($teachers as $teacher)
                                <tr>
                                    <td class="align-middle">
                                        <strong>{{ $teacher['name'] ?? $teacher['nombre'] ?? '' }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        {{ $teacher['email'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $teacher['training_center']['name'] ?? $teacher['trainingCenter']['name'] ?? 'N/A' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $teacher['area']['name'] ?? 'N/A' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($teacher['urlFoto']))
                                            <img
                                                src="{{ asset('storage/images/' . $teacher['urlFoto']) }}"
                                                alt="Imagen del profesor"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        @else
                                            <span class="text-muted small">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('teacher.show', $teacher['id'] ?? '') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> mostrar
                                        </a>
                                        <a href="{{ route('teacher.edit', $teacher['id'] ?? '') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-pencil"></i> editar
                                        </a>

                                        <form action="{{ route('teacher.destroy', $teacher['id'] ?? '') }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar profesor?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No se encontraron profesores registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>