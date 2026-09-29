<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AdminSENA</title>
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

        .login-container {
            width: 400px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
        }

        .login-container p {
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

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #39a900;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-login:hover {
            background: #2d8500;
        }

        .error {
            color: #d00000;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #39a900;
            text-decoration: none;
            font-weight: bold;
        }

        .register-link a:hover {
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

<div class="login-container">

    <h1>AdminSENA</h1>
    <p>Iniciar sesión</p>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

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
            <label for="password">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Ingrese su contraseña"
                required
            >
        </div>

        <button type="submit" class="btn-login">
            Iniciar sesión
        </button>

        <div class="mt-3 text-center">
            <a href="{{ url('/') }}" class="text-decoration-none fw-bold" style="color: #39a900;">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="register-link">
            ¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate aquí</a>
        </div>

        <a href="{{ url('/') }}" class="back-link">← Volver</a>

    </form>

</div>

@include('includes.dependenciasbody') 

</body>
</html>