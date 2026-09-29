<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENA - Contacto</title>
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
        main { flex: 1; }
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
        .contact-card {
            border: 1px solid rgba(0,166,81,.15);
            border-top: 4px solid #00A651;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0,0,0,.06);
            border-radius: 12px;
        }
        .icon-box {
            width: 48px;
            height: 48px;
            background-color: rgba(0, 166, 81, 0.1);
            color: #00A651;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    @include('includes.navbar')

    <main class="container py-5">
        <div class="text-center mb-5">
            <p class="section-title mb-1">Atención al ciudadano</p>
            <h1 class="display-6 fw-bold" style="color: #00A651;">Contáctanos</h1>
            <p class="text-muted mx-auto" style="max-width: 600px;">Estamos aquí para resolver tus dudas sobre cursos, inscripciones y trámites administrativos del SENA.</p>
        </div>

        {{-- MENSAJE DE ÉXITO AL ENVIAR FORMULARIO --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            {{-- FORMULARIO DE CONTACTO --}}
            <div class="col-lg-7">
                <div class="contact-card p-4 p-md-5">
                    <h3 class="h4 fw-bold text-dark mb-4"><i class="bi bi-envelope-paper me-2 text-success"></i>Envíanos un mensaje</h3>
                    
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label small fw-semibold">Nombre completo</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Ej: Maria Perez" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label small fw-semibold">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@sena.edu.co" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label small fw-semibold">Teléfono / Celular</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="300 000 0000">
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label small fw-semibold">Asunto</label>
                                <select class="form-select" id="subject" name="subject" required>
                                    <option value="" selected disabled>Selecciona una opción</option>
                                    <option value="Información de Cursos">Información de Cursos</option>
                                    <option value="Soporte Técnico">Soporte Técnico</option>
                                    <option value="Atención al Aprendiz">Atención al Aprendiz</option>
                                    <option value="PQRS">PQRS</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label small fw-semibold">Mensaje</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Escribe tu consulta aquí..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-sena w-100 py-2">
                                    <i class="bi bi-send me-1"></i> Enviar Consulta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- INFORMACIÓN Y DIRECCIÓN --}}
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3">
                    
                    <div class="contact-card p-4">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Dirección Principal</h6>
                                <p class="text-muted small mb-0">Calle 57 No. 8 - 69, Bogotá D.C.</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="icon-box"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Líneas de Atención</h6>
                                <p class="text-muted small mb-0">Bogotá: (601) 343 0111</p>
                                <p class="text-muted small mb-0">Nacional: 01 8000 910 270</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box"><i class="bi bi-clock-fill"></i></div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark">Horario de Atención</h6>
                                <p class="text-muted small mb-0">Lunes a Viernes: 8:00 a. m. - 5:30 p. m.</p>
                            </div>
                        </div>
                    </div>

                    {{-- MAPA INTEGRADO --}}
                    <div class="contact-card p-2" style="height: 250px;">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.7901037380155!2d-74.0620836241857!3d4.649234895325515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a25f187310d%3A0x2db4a5b281cfd81b!2sSENA%20Direcci%C3%B3n%20General!5e0!3m2!1ses!2sco!4v1700000000000!5m2!1ses!2sco" 
                            width="100%" 
                            height="100%" 
                            style="border:0; border-radius: 8px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>
        </div>
    </main>

    @include('includes.footer')

    @include('includes.dependenciasbody')
</body>
</html>