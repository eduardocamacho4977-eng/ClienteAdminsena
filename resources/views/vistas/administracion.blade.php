<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administracion</title>
       @include('includes.dependencias')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
           body {
            background: #ffffff;
            color: #333333;
            min-height: 100vh;
            display: flex;    
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        footer {
            background: #00A651;
            padding: 2rem 0;
            border-top: 1px solid rgba(0,166,81,0.1);
            color: #ffffff;
        }
        .hero {
            min-height: 80vh;
        }
        .card-custom {
            background: rgba(0,166,81,.08);
            border: 2px solid rgba(0,166,81,.15);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            color: #333333;
        }
        .section-title {
            letter-spacing: .14em;
            text-transform: uppercase;
            opacity: .75;
            font-weight: 600;
            color: #00A651;
        }
        .btn-sena { 
            font-weight: 600; 
            background-color: #00A651;
            border-color: #00A651;
            color: #ffffff;
        }
        .btn-sena:hover {
            background-color: #008040;
            border-color: #008040;
            color: #ffffff;
        }
        .logo-sena {
            max-height: 80px;
            margin-bottom: 2rem;
            border-radius: 50%;
        }
        .navbar-sena {
            background: linear-gradient(135deg, #00A651 0%, #00A651 0%) !important;
        }
        .btn-sena-outline {
            border: 2px solid #00A651;
            color: #00A651;
            font-weight: 600;
            background-color: transparent;
        }
        .btn-sena-outline:hover {
            background-color: #00A651;
            color: #ffffff;
        }
        .info-card {
            border: 1px solid rgba(0,166,81,.15);
            border-left: 4px solid #00A651;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0,0,0,.06);
        }
        .h2 {
            
        }
    </style>
</head>
<body>

    @include('includes.navbar')

   <main class="container py-5">
        <div class="text-center mb-5">

     <section class="mt-5 pt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  
                   <h1 class="display-5 fw-bold" style="color: #00A651;">administracion</h1>
                </div>

                <i class="bi bi-sliders2 fs-2" style="color: #00A651;" aria-hidden="true"></i>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 gy-3">
                @admin
                    <div class="col">
                        <a href="{{ route('area.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-diagram-3 fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Áreas</h3>
                            <p class="text-muted mb-0">Organiza las áreas de formación.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('training_center.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-building fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Centros de formación</h3>
                            <p class="text-muted mb-0">Consulta y administra los centros.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('course.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-book fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Cursos</h3>
                            <p class="text-muted mb-0">Gestiona la oferta académica.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('teacher.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-person-workspace fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Profesores</h3>
                            <p class="text-muted mb-0">Administra instructores y docentes.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('apprentice.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-people fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Aprendices</h3>
                            <p class="text-muted mb-0">Revisa aprendices y sus avances.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('computer.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-pc-display fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Computadoras</h3>
                            <p class="text-muted mb-0">Controla los equipos disponibles.</p>
                        </a>
                    </div>
                @elseif(auth()->user()->isInstructor())
                    <div class="col">
                        <a href="{{ route('apprentice.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-people fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Aprendices</h3>
                            <p class="text-muted mb-0">Revisa aprendices y observaciones.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('course.index') }}" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-book fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Cursos</h3>
                            <p class="text-muted mb-0">Gestiona la asignatura que dicta.</p>
                        </a>
                    </div>
                @elseif(auth()->user()->isApplicant())
                    <div class="col">
                        <a href="#" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-file-earmark-text fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Postulaciones</h3>
                            <p class="text-muted mb-0">Consulta tus solicitudes y estado.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-folder2-open fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Documentación</h3>
                            <p class="text-muted mb-0">Carga y revisa tus documentos.</p>
                        </a>
                    </div>
                @else
                    <div class="col">
                        <a href="#" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-journal-bookmark fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Mis cursos</h3>
                            <p class="text-muted mb-0">Revisa tus asignaturas actuales.</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#" class="card card-custom p-3 h-100 text-decoration-none">
                            <i class="bi bi-graph-up-arrow fs-3 mb-2" style="color: #00A651;" aria-hidden="true"></i>
                            <h3 class="h5 text-dark mb-1">Mi progreso</h3>
                            <p class="text-muted mb-0">Consulta tu rendimiento.</p>
                        </a>
                    </div>
                @endif
            </div>
        </section>
    </main>

          @include('includes.footer')
          
    @include('includes.dependenciasbody')       
    
</body>
</html>