<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Centros de Formación</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="mb-4 text-center">LISTAR CENTROS DE FORMACIÓN</h1>

        <form method="GET" action="{{ route('training_center.index') }}" class="row g-2 mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, ubicación o ID" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="{{ route('training_center.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>

        <div class="mb-3">
            <a href="{{ route('training_center.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nuevo Centro
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="idTrainingCenter" class="table table-striped table-hover mb-0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($training_centers) && count($training_centers) > 0)
                            @foreach ($training_centers as $training_center)
                                <tr>
                                    <td class="align-middle">
                                        <strong>{{ $training_center['name'] ?? $training_center['nombre'] ?? '' }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        {{ $training_center['location'] ?? $training_center['ubicacion'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($training_center['urlFoto']))
                                            <img
                                                src="{{ asset('storage/images/' . $training_center['urlFoto']) }}"
                                                alt="Imagen del centro"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        @else
                                            <span class="text-muted small">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('training_center.show', $training_center['id'] ?? '') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> mostrar
                                        </a>
                                        <a href="{{ route('training_center.edit', $training_center['id'] ?? '') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-pencil"></i> editar
                                        </a>

                                        <form action="{{ route('training_center.destroy', $training_center['id'] ?? '') }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar centro?')">
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
                                <td colspan="4" class="text-center py-4 text-muted">No se encontraron centros de formación registrados.</td>
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