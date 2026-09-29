<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Computadoras</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h1 class="mb-4 text-center">LISTAR COMPUTADORAS</h1>

        <form method="GET" action="{{ route('computer.index') }}" class="row g-2 mb-4">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Buscar por número, marca o ID" value="{{ $search ?? '' }}">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <a href="{{ route('computer.index') }}" class="btn btn-outline-secondary">Limpiar</a>
            </div>
        </form>

        <div class="mb-3">
            <a href="{{ route('computer.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nueva Computadora
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table id="idComputer" class="table table-striped table-hover mb-0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Número</th>
                            <th>Marca</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($computers) && count($computers) > 0)
                            @foreach ($computers as $computer)
                                <tr>
                                    <!-- Sintaxis de array para evitar errores en llamadas API -->
                                    <td class="align-middle">
                                        <strong>{{ $computer['number'] ?? $computer['numero'] ?? '' }}</strong>
                                    </td>
                                    <td class="align-middle">
                                        {{ $computer['brand'] ?? $computer['marca'] ?? '' }}
                                    </td>
                                    <td class="align-middle">
                                        @if (!empty($computer['urlFoto']))
                                            <img
                                                src="{{ asset('storage/images/' . $computer['urlFoto']) }}"
                                                alt="Imagen de la computadora"
                                                width="80"
                                                height="80"
                                                style="object-fit: cover; border-radius: 5px;"
                                            >
                                        @else
                                            <span class="text-muted small">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('computer.show', $computer['id'] ?? '') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-eye"></i> mostrar
                                        </a>
                                        <a href="{{ route('computer.edit', $computer['id'] ?? '') }}" class="btn btn-sm btn-secondary">
                                            <i class="bi bi-pencil"></i> editar
                                        </a>

                                        <form action="{{ route('computer.destroy', $computer['id'] ?? '') }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Eliminar computadora?')">
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
                                <td colspan="4" class="text-center py-4 text-muted">No se encontraron computadoras registradas.</td>
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