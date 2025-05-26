<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Panel Principal - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .hero {
            background: #e9f2ff;
            padding: 4rem 2rem;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-weight: 800;
            color: #0d6efd;
        }

        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0,0,0,0.15);
        }

        .feature-card i {
            font-size: 2rem;
            color: #0d6efd;
            margin-bottom: 0.5rem;
        }

        .education-section {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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
                    <a class="nav-link" href="{{ route('estadistica') }}"><i class="bi bi-speedometer2"></i> Estadisticas</a>
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

<!-- Hero Section -->
<div class="container mt-4">
    <div class="hero">
        <h1>Bienvenido al Sistema de Gestión Educativa MINEDUC</h1>
        <p>Centralizando la información educativa para un futuro más brillante en Guatemala.</p>
        <a href="{{ route('estadistica') }}" class="btn btn-primary me-2">Ver Estadisticas</a>
        <a href="{{ route('escuelas.index') }}" class="btn btn-outline-primary">Ver Escuelas</a>
    </div>

    <!-- Funcionalidades -->
    <h3 class="text-center mb-4">Funcionalidades Principales</h3>
    <div class="row text-center g-4">
        <div class="col-md-4">
            <div class="feature-card">
                <i class="bi bi-person-lines-fill"></i>
                <h5 class="mt-2">Gestión de Alumnos</h5>
                <p>Registre y administre la información de los estudiantes, incluyendo tutores.</p>
                <a href="{{ route('alumnos.index') }}" class="btn btn-sm btn-primary">Administrar Alumnos</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <i class="bi bi-journals"></i>
                <h5 class="mt-2">Administración Académica</h5>
                <p>Gestione grados, secciones, cursos, programas y horarios de clases.</p>
                <a href="{{ route('cursos.index') }}" class="btn btn-sm btn-primary">Gestionar Cursos</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-card">
                <i class="bi bi-bar-chart-line-fill"></i>
                <h5 class="mt-2">Reportes Estadísticos</h5>
                <p>Genere reportes ejecutivos para decisiones estratégicas.</p>
                <a href="{{ route('estadistica') }}" class="btn btn-sm btn-primary">Ver Reportes</a>
            </div>
        </div>
    </div>

    <!-- Educación -->
    <div class="row education-section align-items-center">
        <div class="col-md-6">
            <h4 class="text-primary">Compromiso con la Educación</h4>
            <p>Plataforma clave para mejorar la gestión y análisis educativo a nivel nacional.</p>
            <a href="#" class="btn btn-outline-secondary">Conocer Más Sobre el Plan</a>
        </div>
        <div class="col-md-6">
            <img src="https://www.guatemala.com/fotos/2024/12/Carreras-autorizadas-en-Guatemala-2025-MINEDUC.jpg" alt="Educación MINEDUC" class="img-fluid rounded">
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-center py-4">
    <small>&copy; {{ date('Y') }} Ministerio de Educación de Guatemala - Todos los derechos reservados.</small>
</footer>

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
