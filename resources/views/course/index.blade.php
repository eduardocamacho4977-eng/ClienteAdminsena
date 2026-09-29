<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Cursos</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="mb-4 text-center">LISTAR CURSOS</h1>

        <form method="GET" action="{{ route('course.index') }}" class="row g-2 mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por número o día" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="{{ route('course.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>

        <div class="mb-3">
            <a href="{{ route('course.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Curso
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="idCourse" class="table table-striped table-hover mb-0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Número de curso</th>
                            <th>Día</th>
                            <th>Área</th>
                            <th>Centro</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($courses) && count($courses) > 0)
                            @foreach ($courses as $course)
                                <tr>
                                    <!-- Sintaxis de array para consumir la API -->
                                    <td class="align-middle">
                                        <strong>{{ $course['course_number'] ?? $course['numero_curso'] ?? '' }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        {{ $course['day'] ?? $course['dia'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        <!-- En las relaciones traídas por API, se accede como arreglo anidado -->
                                        {{ $course['area']['name'] ?? $course['area_name'] ?? 'Sin Área' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $course['training_center']['name'] ?? $course['trainingCenter']['name'] ?? 'Sin Centro' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($course['urlFoto']))
                                            <img
                                                src="{{ asset('storage/images/' . $course['urlFoto']) }}"
                                                alt="Imagen del curso"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        @else
                                            <span class="text-muted small">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('course.show', $course['id'] ?? '') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </a>
                                        <a href="{{ route('course.edit', $course['id'] ?? '') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-pencil"></i> Editar
                                        </a>

                                        <form action="{{ route('course.destroy', $course['id'] ?? '') }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar curso?')">
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
                                <td colspan="6" class="text-center py-4 text-muted">No se encontraron cursos registrados.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>