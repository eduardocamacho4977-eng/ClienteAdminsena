<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - AdminSENA</title>
    @include('includes.dependencias')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f2f2f2;
        }

        .register-container {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }

        .register-container p {
            text-align: center;
            margin-bottom: 25px;
            color: #777;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #39a900;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-register:hover {
            background: #2d8500;
        }

        .error {
            color: #d00000;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: #39a900;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-link {
            display: inline-block;
            margin-top: 18px;
            text-align: center;
            width: 100%;
            color: #39a900;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="register-container">

    <h1>AdminSENA</h1>
    <p>Crear nueva cuenta</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Ingrese su nombre"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Ingrese su correo"
                required
            >
        </div>

        <div class="form-group">
            <label for="role">Rol</label>
            <select id="role" name="role" class="form-control" required>
                <option value="aprendiz" selected>Aprendiz</option>
                <option value="instructor">Instructor</option>
                <option value="aspirante">Aspirante</option>
            </select>
        </div>

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Cree una contraseña (mín. 6 caracteres)"
                required
            >
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Repita la contraseña"
                required
            >
        </div>

        <button type="submit" class="btn-register">
            Registrarse
        </button>

        <div class="mt-3 text-center">
            <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #39a900;">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="login-link">
            ¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
        </div>

        <a href="{{ url('/') }}" class="back-link">← Volver</a>

    </form>

</div>

@include('includes.dependenciasbody') 

</body>
</html>