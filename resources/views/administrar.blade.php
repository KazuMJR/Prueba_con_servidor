<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Administración Académica - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>

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

        .fade-transition {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out {
            transition: opacity 0.5s ease-out;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .page-header {
            background: #e9f2ff;
            padding: 3rem 2rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #0d6efd;
            font-weight: 800;
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 2rem 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.15);
        }

        .feature-card i {
            font-size: 3rem;
            color: black;  /* Cambiado a negro */
            margin-bottom: 0.5rem;
        }

        .feature-description {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 1rem;
            min-height: 48px; /* altura mínima para que todas las descripciones tengan el mismo alto */
        }

        .feature-card a.btn {
            margin-top: auto;
            font-weight: 600;
        }

        @media (max-width: 576px) {
            .page-header {
                padding: 2rem 1rem;
            }

            .feature-card {
                padding: 1.5rem 1rem;
            }
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
                    <a class="nav-link" href="{{ route('estadistica') }}"><i class="bi bi-speedometer2"></i> Estadisticas</a>
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
    <div class="page-header">
        <h1>Administración Académica</h1>
        <p class="lead">Aquí podrás administrar todo lo relacionado con la estructura académica.</p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-person-badge-fill"></i>
                <div class="feature-description">Gestión de los docentes y catedráticos del sistema.</div>
                <a href="{{ route('catedraticos.index') }}" class="btn btn-primary w-100">Catedráticos</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-person-lines-fill"></i>
                <div class="feature-description">Administración de asignaciones docentes y grupos.</div>
                <a href="{{ route('asignaciones.index') }}" class="btn btn-primary w-100">Asignaciones</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-building"></i>
                <div class="feature-description">Información y gestión de las escuelas y centros educativos.</div>
                <a href="{{ route('escuelas.index') }}" class="btn btn-primary w-100">Escuelas</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-layers-fill"></i>
                <div class="feature-description">Organización de los grados escolares disponibles.</div>
                <a href="{{ route('grados.index') }}" class="btn btn-primary w-100">Grados</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-diagram-3-fill"></i>
                <div class="feature-description">Control y gestión de las secciones académicas.</div>
                <a href="{{ route('secciones.index') }}" class="btn btn-primary w-100">Secciones</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-journal-bookmark-fill"></i>
                <div class="feature-description">Manejo de los cursos impartidos en el sistema.</div>
                <a href="{{ route('cursos.index') }}" class="btn btn-primary w-100">Cursos</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-calendar-week"></i>
                <div class="feature-description">Configuración de horarios de clases y actividades.</div>
                <a href="{{ route('horario_clase.index') }}" class="btn btn-primary w-100">Horarios</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-calendar2-event-fill"></i>
                <div class="feature-description">Gestión de calendarios académicos y eventos.</div>
                <a href="{{ route('calendarios.index') }}" class="btn btn-primary w-100">Calendarios</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-easel-fill"></i>
                <div class="feature-description">Administración de programas educativos y planes.</div>
                <a href="{{ route('programas.index') }}" class="btn btn-primary w-100">Programas</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-lightning-fill"></i>
                <div class="feature-description">Manejo de actividades y eventos académicos.</div>
                <a href="{{ route('actividades.index') }}" class="btn btn-primary w-100">Actividades</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
