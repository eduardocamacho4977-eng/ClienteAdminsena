<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin sena</title>

    @include('includes.dependencias')
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            background: #ffffff;
            min-height: 100vh;
        }
        .container {
            flex: 1;
        }
        footer {
            margin-top: auto;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    @include('includes.navbar')

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success" role="status">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>

    @include('includes.footer')

    @include('includes.dependenciasbody')


</body>

</html>