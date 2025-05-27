<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas de Reportes Ejecutivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f5f6fa;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-radius: 1rem;
        }
        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .display-6 {
            font-size: 2rem;
        }
        .navbar-brand img {
            height: 50px;
        }

        .navbar-nav .nav-link {
            transition: background-color 0.3s, color 0.3s;
            border-radius: 5px;
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: #e2e6ea;
            color: #0d6efd !important;
        }

        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }

        @media (min-width: 992px) {
            .navbar-nav {
                flex-wrap: wrap;
            }

            .navbar-collapse {
                justify-content: flex-end;
            }
        }

        .fade-transition {
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}
     
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('principal') }}">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Logotipo-MINEDUC-2024-2028_AZUL_H.png/330px-Logotipo-MINEDUC-2024-2028_AZUL_H.png" alt="Logo MINEDUC">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('principal') }}"><i class="bi bi-house-fill"></i> Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('alumnos.index') }}"><i class="bi bi-people-fill"></i> Alumnos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('catedraticos.index') }}"><i class="bi bi-person-badge-fill"></i> Catedráticos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('escuelas.index') }}"><i class="bi bi-building"></i> Escuelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cursos.index') }}"><i class="bi bi-journal-bookmark-fill"></i> Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('grados.index') }}"><i class="bi bi-layers-fill"></i> Grados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('secciones.index') }}"><i class="bi bi-diagram-3-fill"></i> Secciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inscripciones.index') }}"><i class="bi bi-card-checklist"></i> Inscripciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tutelares.index') }}"><i class="bi bi-person-hearts"></i> Tutelares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asignaciones.index') }}"><i class="bi bi-person-lines-fill"></i> Asignaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('horario_clase.index') }}"><i class="bi bi-calendar-week"></i> Horarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('calendarios.index') }}"><i class="bi bi-calendar2-event-fill"></i> Calendarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('programas.index') }}"><i class="bi bi-easel-fill"></i> Programas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actividades.index') }}"><i class="bi bi-lightning-fill"></i> Actividades</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

    <div class="container py-5">
        <h2 class="mb-1">Estadisticas de Reportes Ejecutivos</h2>
        <p class="text-muted mb-4">Visión general del sistema educativo nacional.</p>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Alumnos Inscritos</h6>
                        <h3>{{ number_format($totalAlumnos) }}</h3>
                        <small class="text-success">+5.2% desde el mes pasado</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Escuelas Registradas</h6>
                        <h3>{{ number_format($totalEscuelas) }}</h3>
                        <small class="text-success">+120 nuevas este año</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="card-title">Total Catedráticos Activos</h6>
                        <h3>{{ number_format($totalCatedraticos) }}</h3>
                        <small class="text-success">+3.1% en capacitación</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body">
                        <h6 class="card-title">Cursos Disponibles</h6>
                        <h3>{{ number_format($totalCursos) }}</h3>
                        <small class="text-muted">Según CNB actualizado</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Alumnos por Edad</h6>
                        <canvas id="graficoEdades"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Catedráticos por Nivel Educativo</h6>
                        <canvas id="graficoNivel"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Actividad Reciente del Sistema</h6>
                <ul class="list-unstyled mb-0">
                    <li><strong>Nueva escuela registrada:</strong> "Escuela Oficial Rural Mixta Aldea El Progreso"</li>
                    <li><strong>Actualización masiva:</strong> 1,500 registros de alumnos actualizados en el departamento de Guatemala.</li>
                    <li><strong>Nuevo catedrático añadido:</strong> Lic. Juan Pérez a la Escuela "Luz del Mañana".</li>
                </ul>
                <div class="text-end mt-3">
                    <button class="btn btn-outline-primary btn-sm">Ver todas las actividades</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctxEdad = document.getElementById('graficoEdades').getContext('2d');
        const graficoEdades = new Chart(ctxEdad, {
            type: 'bar',
            data: {
                labels: {!! json_encode($estadisticasEdades->keys()) !!},
                datasets: [{
                    label: 'Cantidad de Alumnos',
                    data: {!! json_encode($estadisticasEdades->values()) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });

        const ctxNivel = document.getElementById('graficoNivel').getContext('2d');
        const graficoNivel = new Chart(ctxNivel, {
            type: 'pie',
            data: {
                labels: {!! json_encode($catedraticosPorNivel->keys()) !!},
                datasets: [{
                    label: 'Catedráticos por Nivel Educativo',
                    data: {!! json_encode($catedraticosPorNivel->values()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                    ]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.body.classList.add("fade-transition");
        document.body.style.opacity = 1;

        const links = document.querySelectorAll("a[href]");
        links.forEach(link => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (!href.startsWith('#') && this.target !== "_blank") {
                    e.preventDefault();
                    document.body.style.opacity = 0;
                    setTimeout(() => {
                        window.location.href = href;
                    }, 300);
                }
            });
        });
    });
</script>


</body>

</html>
