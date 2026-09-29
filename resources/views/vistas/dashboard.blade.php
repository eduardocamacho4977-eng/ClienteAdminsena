<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - AdminSENA</title>
</head>

<body>

    <h1>Bienvenido a AdminSENA</h1>

    <p>
        Usuario: {{ Auth::user()->name }}
    </p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit">
            Cerrar sesión
        </button>
    </form>

</body>
</html>