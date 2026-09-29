<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Aprendices</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="mb-4 text-center">LISTAR APRENDICES</h1>

        <form method="GET" action="{{ route('apprentice.index') }}" class="row g-2 mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, correo, teléfono, curso o computador" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="{{ route('apprentice.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>

        <div class="mb-3">
            <a href="{{ route('apprentice.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Aprendiz
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="idApprentice" class="table table-striped table-hover mb-0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Curso</th>
                            <th>Computadora</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($apprentices) && count($apprentices) > 0)
                            @foreach ($apprentices as $apprentice)
                                <tr>
                                    <!-- Sintaxis de array para atributos del aprendiz -->
                                    <td class="align-middle">
                                        <strong>{{ $apprentice['name'] ?? $apprentice['nombre'] ?? '' }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        {{ $apprentice['email'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $apprentice['cell_number'] ?? $apprentice['celular'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        <!-- Acceso anidado seguro a las relaciones de la API -->
                                        {{ $apprentice['course']['course_number'] ?? $apprentice['course_number'] ?? 'Sin curso' }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $apprentice['computer']['number'] ?? $apprentice['computer_number'] ?? 'Sin PC' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($apprentice['urlFoto']))
                                            <img
                                                src="{{ asset('storage/images/' . $apprentice['urlFoto']) }}"
                                                alt="Imagen del aprendiz"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        @else
                                            <span class="text-muted small">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('apprentice.show', $apprentice['id'] ?? '') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> mostrar
                                        </a>
                                        <a href="{{ route('apprentice.edit', $apprentice['id'] ?? '') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-pencil"></i> editar
                                        </a>

                                        <form action="{{ route('apprentice.destroy', $apprentice['id'] ?? '') }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar aprendiz?')">
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
                                <td colspan="7" class="text-center py-4 text-muted">No se encontraron aprendices registrados.</td>
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