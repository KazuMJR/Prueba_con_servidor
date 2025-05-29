<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Estadísticas de Reportes Ejecutivos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f5f6fa;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        body.fade-in {
            opacity: 1;
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
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('principal') }}">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Logotipo-MINEDUC-2024-2028_AZUL_H.png/330px-Logotipo-MINEDUC-2024-2028_AZUL_H.png"
                    alt="Logo MINEDUC" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('principal')) active @endif" href="{{ route('principal') }}">
                            <i class="bi bi-house-fill text-primary me-1"></i> Principal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('gestion')) active @endif" href="{{ route('gestion') }}">
                            <i class="bi bi-person-lines-fill text-primary me-1"></i> Gestión de Alumnos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('administrar')) active @endif" href="{{ route('administrar') }}">
                            <i class="bi bi-journals text-primary me-1"></i> Administración Académica
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <h2 class="mb-1">Estadísticas de Reportes Ejecutivos</h2>
        <p class="text-muted mb-4">Visión general del sistema educativo nacional.</p>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <h6 class="card-title">Total Alumnos Inscritos</h6>
                        <h3>{{ number_format($totalAlumnos) }}</h3>
                        <small class="text-success">+5.2% desde el mes pasado</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <h6 class="card-title">Total Escuelas Registradas</h6>
                        <h3>{{ number_format($totalEscuelas) }}</h3>
                        <small class="text-success">+120 nuevas este año</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body text-center">
                        <h6 class="card-title">Total Catedráticos Activos</h6>
                        <h3>{{ number_format($totalCatedraticos) }}</h3>
                        <small class="text-success">+3.1% en capacitación</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <div class="card-body text-center">
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

        <!-- Reporte Total Alumnos por Escuela y Grado -->
        <div class="row g-3 mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Total de Alumnos Inscritos por Escuela y Grado</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Escuela</th>
                                        <th>Grado</th>
                                        <th>Total Alumnos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnosPorEscuelaYGrado as $registro)
                                    <tr>
                                        <td>{{ $registro->nombre_escuela }}</td>
                                        <td>{{ $registro->nombre_grado }}</td>
                                        <td>{{ $registro->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reporte Total Alumnos por Grado y por Catedrático -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Total de Alumnos por Grado</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Grado</th>
                                        <th>Total Alumnos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnosPorGrado as $registro)
                                    <tr>
                                        <td>{{ $registro->nombre_grado }}</td>
                                        <td>{{ $registro->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Total de Alumnos por Catedrático</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Catedrático</th>
                                        <th>Total Alumnos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alumnosPorCatedratico as $registro)
                                    <tr>
                                        <td>{{ $registro->nombre_catedratico }}</td>
                                        <td>{{ $registro->total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Actividad Reciente del Sistema</h6>
                <ul class="list-unstyled mb-0">
                    <li><strong>Nueva escuela registrada:</strong> "{{ $ultimaEscuela->nombre_escuela ?? 'N/A' }}"</li>
                    <li><strong>Último curso registrado:</strong> "{{ $ultimoCurso->nombre_curso ?? 'N/A' }}"</li>
                    <li><strong>Nuevo catedrático añadido:</strong> {{ $ultimoCatedratico->nombre_catedratico ?? 'N/A' }}.</li>
                </ul>
                <div class="text-end mt-3">
                    <button class="btn btn-outline-primary btn-sm">Ver todas las actividades</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.body.classList.add("fade-in");

            const links = document.querySelectorAll("a[href]");
            links.forEach(link => {
                link.addEventListener("click", function (e) {
                    const href = this.getAttribute("href");
                    if (!href.startsWith('#') && !this.target || this.target !== "_blank") {
                        e.preventDefault();
                        document.body.classList.remove("fade-in");
                        setTimeout(() => {
                            window.location.href = href;
                        }, 300);
                    }
                });
            });
        });

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
                responsive: true,
                scales: { y: { beginAtZero: true } }
            }
        });

        const ctxNivel = document.getElementById('graficoNivel').getContext('2d');
        const graficoNivel = new Chart(ctxNivel, {
            type: 'pie',
            data: {
                labels: {!! json_encode($catedraticosPorNivel->keys()) !!},
                datasets: [{
                    label: 'Catedráticos',
                    data: {!! json_encode($catedraticosPorNivel->values()) !!},
                    backgroundColor: [
                        '#007bff',
                        '#dc3545',
                        '#ffc107',
                        '#28a745',
                        '#6c757d'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
