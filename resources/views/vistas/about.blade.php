<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nosotros | SENA</title>
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
        .card-custom {
            background: rgba(0, 166, 81, .08);
            border: 2px solid rgba(0, 166, 81, .15);
            box-shadow: 0 8px 32px rgba(0, 0, 0, .08);
            color: #333333;
        }
        .section-title {
            letter-spacing: .14em;
            text-transform: uppercase;
            opacity: .75;
            font-weight: 600;
            color: #00A651;
        }
        footer {
            background: #00A651;
            padding: 2rem 0;
            border-top: 1px solid rgba(0, 166, 81, .1);
            color: #ffffff;
        }
    </style>
</head>
<body>
    @include('includes.navbar')

    <main class="container py-5">
        <div class="text-center mb-5">
            <p class="section-title mb-3">Conoce nuestra institución</p>
            <h1 class="display-5 fw-bold" style="color: #00A651;">Sobre nosotros</h1>
            <p class="lead text-muted">Conoce la misión y visión que orientan el trabajo del SENA.</p>
        </div>

        <section class="row justify-content-center gy-4">
            <div class="col-lg-5">
                <div class="card card-custom p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-bullseye fs-2 me-3" style="color: #00A651;"></i>
                        <h2 class="h4 mb-0">Misión</h2>
                    </div>
                    <p class="mb-0">El SENA está encargado de cumplir la función que le corresponde al Estado de invertir en el desarrollo social y técnico de los trabajadores colombianos, ofreciendo y ejecutando la formación profesional integral, para la incorporación y el desarrollo de las personas en actividades productivas que contribuyan al desarrollo social, económico y tecnológico del país.</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-custom p-4 h-100">
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-eye fs-2 me-3" style="color: #00A651;"></i>
                        <h2 class="h4 mb-0">Visión</h2>
                    </div>
                    <p class="mb-0">En el año 2026, el SENA estará consolidado como una entidad referente de formación integral para el trabajo, por su aporte a la empleabilidad, el emprendimiento y la equidad, que atiende con tecnología e innovación las necesidades de los sectores productivos y las regiones, contribuyendo al desarrollo social y económico de Colombia.</p>
                </div>
            </div>
        </section>
    </main>

    @include('includes.footer')
    @include('includes.dependenciasbody')
</body>
</html>
