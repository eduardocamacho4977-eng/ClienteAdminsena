<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENA - Portal Administrativo</title>
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
        footer {
            background: #00A651;
            padding: 2rem 0;
            border-top: 1px solid rgba(0,166,81,0.1);
            color: #ffffff;
        }
        .hero { min-height: 80vh; }
        .card-custom {
            border: 2px solid rgba(0,166,81,.2);
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            overflow: hidden;
            height: 380px;
            position: relative;
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
            transition: all 0.2s ease;
        }
        .info-card:hover {
            transform: translateY(-2px);
            border-color: #00A651;
        }

        #senaCarousel, #senaCarousel .carousel-inner, #senaCarousel .carousel-item {
            height: 100%;
        }
        .carousel-bg-slide {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Botón Icono Interactivo */
        .btn-calendar-trigger {
            background: none;
            border: none;
            color: #00A651;
            padding: 4px;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s;
        }
        .btn-calendar-trigger:hover {
            background-color: rgba(0, 166, 81, 0.1);
            transform: scale(1.15);
        }

        /* Estilos del Calendario del Modal */
        .modal-calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px;
            text-align: center;
        }
        .modal-calendar-head {
            font-weight: bold;
            color: #00A651;
            font-size: 0.85rem;
            padding-bottom: 5px;
        }
        .modal-calendar-day {
            padding: 8px 0;
            border-radius: 8px;
            font-size: 0.85rem;
            background-color: #f8f9fa;
            border: 1px solid transparent;
            transition: all 0.2s ease;
            position: relative;
        }
        .modal-calendar-day.empty {
            background-color: transparent;
        }
        .modal-calendar-day.event-day {
            background-color: #00A651 !important;
            color: #ffffff !important;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(0,166,81,0.3);
            border-color: #008040;
        }
        .event-time-tag {
            font-size: 0.6rem;
            display: block;
            margin-top: 2px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    @include('includes.navbar')

    <main class="container py-5 hero">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold" style="color: #00A651;">SENA</h1>
                <p class="lead" style="color: #666666;">Gestiona cursos, instructores, aprendices y centros de formación con una interfaz simple y moderna.</p>
                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('course.index') }}" class="btn btn-sena btn-lg">Ver cursos</a>
                    <a href="{{ route('apprentice.index') }}" class="btn btn-sena-outline btn-lg">Ver aprendices</a>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card card-custom p-0 rounded-4">
                    <div id="senaCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#senaCarousel" data-bs-slide-to="2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="3000">
                                <div class="carousel-bg-slide" style="background-image: url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=800&q=80');"></div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="carousel-bg-slide" style="background-image: url('https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80');"></div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="carousel-bg-slide" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80');"></div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#senaCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#senaCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-5 pt-3">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="section-title mb-1">Mantente informado</p>
                            <h2 class="h3 fw-bold text-dark mb-0">Noticias</h2>
                        </div>
                        <i class="bi bi-newspaper fs-2" style="color: #00A651;"></i>
                    </div>
                    <div class="d-grid gap-3">
                        <article class="info-card rounded-3 p-4">
                            <small class="text-success fw-semibold">FORMACIÓN</small>
                            <h3 class="h5 text-dark mt-2">Nuevos cursos disponibles</h3>
                            <p class="text-muted mb-0">Consulta la oferta académica y encuentra nuevas oportunidades de formación para los aprendices.</p>
                        </article>
                        <article class="info-card rounded-3 p-4">
                            <small class="text-success fw-semibold">COMUNIDAD SENA</small>
                            <h3 class="h5 text-dark mt-2">Actualización del portal administrativo</h3>
                            <p class="text-muted mb-0">Ya puedes consultar y administrar la información de cursos, instructores y centros desde un solo lugar.</p>
                        </article>
                    </div>
                </div>

                {{-- AGENDA CON EVENTOS DINÁMICOS Y REPROGRAMABLES --}}
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <p class="section-title mb-1">Agenda</p>
                            <h2 class="h3 fw-bold text-dark mb-0">Próximos eventos</h2>
                        </div>
                        <button class="btn-calendar-trigger" id="mainCalendarIcon" title="Ver todos los eventos agendados">
                            <i class="bi bi-calendar-event fs-2"></i>
                        </button>
                    </div>

                    {{-- EVENTO 1: FERIA DE OPORTUNIDADES --}}
                    <div class="info-card rounded-3 p-4 mb-3">
                        <div class="d-flex gap-3 align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="text-center text-success fw-bold">
                                    <span class="d-block fs-3 lh-1" id="display-day-feria">15</span>
                                    <small id="display-month-feria">SEP</small>
                                </div>
                                <div>
                                    <h3 class="h5 text-dark mb-1">Feria de oportunidades</h3>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-clock me-1"></i>
                                        <span id="display-time-feria">08:00</span> · Auditorio principal
                                    </p>
                                </div>
                            </div>
                            <button class="btn-calendar-trigger text-success" onclick="openEventModal('feria')" title="Editar fecha u hora">
                                <i class="bi bi-calendar-check fs-3"></i>
                            </button>
                        </div>
                    </div>

                    {{-- EVENTO 2: ENCUENTRO DE INSTRUCTORES --}}
                    <div class="info-card rounded-3 p-4">
                        <div class="d-flex gap-3 align-items-center justify-content-between">
                            <div class="d-flex gap-3 align-items-center">
                                <div class="text-center text-success fw-bold">
                                    <span class="d-block fs-3 lh-1" id="display-day-encuentro">28</span>
                                    <small id="display-month-encuentro">SEP</small>
                                </div>
                                <div>
                                    <h3 class="h5 text-dark mb-1">Encuentro de instructores</h3>
                                    <p class="text-muted mb-0">
                                        <i class="bi bi-clock me-1"></i>
                                        <span id="display-time-encuentro">14:00</span> · Sala de reuniones
                                    </p>
                                </div>
                            </div>
                            <button class="btn-calendar-trigger text-success" onclick="openEventModal('encuentro')" title="Editar fecha u hora">
                                <i class="bi bi-calendar-check fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- MODAL INTERACTIVO CON EDICIÓN DE FECHA Y HORA --}}
    <div class="modal fade" id="dynamicCalendarModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="modal-header text-white" style="background-color: #00A651;">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-calendar3 me-2"></i><span id="modalTitle">Calendario</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    {{-- NAVEGACIÓN Y CALENDARIO --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <button id="prevMonthBtn" class="btn btn-sm btn-outline-success"><i class="bi bi-chevron-left"></i></button>
                        <h5 id="modalMonthYear" class="fw-bold text-dark mb-0">Septiembre 2026</h5>
                        <button id="nextMonthBtn" class="btn btn-sm btn-outline-success"><i class="bi bi-chevron-right"></i></button>
                    </div>

                    <div class="modal-calendar-grid mb-2">
                        <div class="modal-calendar-head">Dom</div>
                        <div class="modal-calendar-head">Lun</div>
                        <div class="modal-calendar-head">Mar</div>
                        <div class="modal-calendar-head">Mié</div>
                        <div class="modal-calendar-head">Jue</div>
                        <div class="modal-calendar-head">Vie</div>
                        <div class="modal-calendar-head">Sáb</div>
                    </div>

                    <div id="modalCalendarDays" class="modal-calendar-grid"></div>

                    {{-- FORMULARIO PARA REPROGRAMAR FECHA Y HORA --}}
                    <div id="editSection" class="card mt-4 p-3 bg-light border-0">
                        <h6 class="fw-bold text-success mb-2"><i class="bi bi-pencil-square me-1"></i> Reprogramar Evento</h6>
                        <form id="eventForm" onsubmit="saveEventChanges(event)">
                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">Nueva Fecha</label>
                                    <input type="date" id="inputDate" class="form-control form-control-sm" required>
                                </div>
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">Nueva Hora</label>
                                    <input type="time" id="inputTime" class="form-control form-control-sm" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sena btn-sm w-100 mt-3">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

    @include('includes.dependenciasbody')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    {{-- LÓGICA JAVASCRIPT CON EDICIÓN EN TIEMPO REAL --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarModalInstance = new bootstrap.Modal(document.getElementById('dynamicCalendarModal'));
            let activeType = 'all';
            let currentDate = new Date(2026, 8, 1);

            const monthAbbrs = ["ENE", "FEB", "MAR", "ABR", "MAY", "JUN", "JUL", "AGO", "SEP", "OCT", "NOV", "DIC"];
            const monthNames = [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ];

            const events = {
                feria: {
                    title: "Feria de Oportunidades",
                    date: "2026-09-15",
                    time: "08:00"
                },
                encuentro: {
                    title: "Encuentro de Instructores",
                    date: "2026-09-28",
                    time: "14:00"
                }
            };

            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();

                document.getElementById('modalMonthYear').textContent = `${monthNames[month]} ${year}`;
                const daysContainer = document.getElementById('modalCalendarDays');
                daysContainer.innerHTML = '';

                const firstDayIndex = new Date(year, month, 1).getDay();
                const lastDay = new Date(year, month + 1, 0).getDate();

                for (let i = 0; i < firstDayIndex; i++) {
                    const emptyDiv = document.createElement('div');
                    emptyDiv.classList.add('modal-calendar-day', 'empty');
                    daysContainer.appendChild(emptyDiv);
                }

                for (let day = 1; day <= lastDay; day++) {
                    const dayDiv = document.createElement('div');
                    dayDiv.classList.add('modal-calendar-day');

                    const formattedMonth = String(month + 1).padStart(2, '0');
                    const formattedDay = String(day).padStart(2, '0');
                    const currentDateStr = `${year}-${formattedMonth}-${formattedDay}`;

                    let isEvent = false;
                    let displayTime = '';

                    if ((activeType === 'feria' || activeType === 'all') && currentDateStr === events.feria.date) {
                        isEvent = true;
                        displayTime = events.feria.time;
                    } else if ((activeType === 'encuentro' || activeType === 'all') && currentDateStr === events.encuentro.date) {
                        isEvent = true;
                        displayTime = events.encuentro.time;
                    }

                    if (isEvent) {
                        dayDiv.classList.add('event-day');
                        dayDiv.innerHTML = `<span>${day}</span><span class="event-time-tag">${displayTime}</span>`;
                    } else {
                        dayDiv.textContent = day;
                    }

                    daysContainer.appendChild(dayDiv);
                }
            }

            window.openEventModal = function (type) {
                activeType = type;
                const editSection = document.getElementById('editSection');

                if (type === 'feria' || type === 'encuentro') {
                    const ev = events[type];
                    document.getElementById('modalTitle').textContent = `Calendario: ${ev.title}`;
                    document.getElementById('inputDate').value = ev.date;
                    document.getElementById('inputTime').value = ev.time;
                    editSection.style.display = 'block';

                    // Sincronizar el calendario con el mes de la fecha actual del evento
                    const [y, m] = ev.date.split('-');
                    currentDate = new Date(parseInt(y), parseInt(m) - 1, 1);
                } else {
                    document.getElementById('modalTitle').textContent = "Calendario General de Eventos";
                    editSection.style.display = 'none';
                    currentDate = new Date(2026, 8, 1);
                }

                renderCalendar();
                calendarModalInstance.show();
            };

            window.saveEventChanges = function (e) {
                e.preventDefault();
                if (activeType === 'all') return;

                const newDate = document.getElementById('inputDate').value;
                const newTime = document.getElementById('inputTime').value;

                events[activeType].date = newDate;
                events[activeType].time = newTime;

                // Actualizar interfaz exterior (cards de agenda)
                const [y, m, d] = newDate.split('-');
                document.getElementById(`display-day-${activeType}`).textContent = d;
                document.getElementById(`display-month-${activeType}`).textContent = monthAbbrs[parseInt(m) - 1];
                document.getElementById(`display-time-${activeType}`).textContent = newTime;

                // Renderizar cambios en el calendario
                currentDate = new Date(parseInt(y), parseInt(m) - 1, 1);
                renderCalendar();

                alert('¡Fecha y hora actualizadas correctamente!');
            };

            document.getElementById('mainCalendarIcon').addEventListener('click', function () {
                openEventModal('all');
            });

            document.getElementById('prevMonthBtn').addEventListener('click', function () {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            document.getElementById('nextMonthBtn').addEventListener('click', function () {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });
        });
    </script>
</body>
</html>