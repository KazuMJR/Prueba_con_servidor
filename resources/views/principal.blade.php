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
            height: 100%;
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

        footer small {
            font-size: 0.85rem;
        }

        @media (max-width: 576px) {
            .hero {
                padding: 2rem 1rem;
            }

            .feature-card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<div class="container mt-4">
    <div class="hero">
        <h1>Bienvenido al Sistema de Gestión Educativa MINEDUC</h1>
        <p>Centralizando la información educativa para un futuro más brillante en Guatemala.</p>
        <a href="{{ route('estadistica') }}" class="btn btn-primary me-2">Ver Estadísticas</a>
    </div>

    <!-- Funcionalidades -->
    <h3 class="text-center mb-4">Funcionalidades Principales</h3>
    <div class="row text-center g-4">
        <div class="col-12 col-md-4">
            <div class="feature-card">
                <i class="bi bi-person-lines-fill"></i>
                <h5 class="mt-2">Gestión de Alumnos</h5>
                <p>Registre y administre la información de los estudiantes, tutelares y las Inscripciones.</p>
                <a href="{{ route('gestion') }}" class="btn btn-sm btn-primary">Gestionar</a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="feature-card">
                <i class="bi bi-journals"></i>
                <h5 class="mt-2">Administración Académica</h5>
                <p>Gestione catedráticos, asignaciones, escuelas, grados, secciones, cursos, horarios, calendarios, programas y actividades.</p>
                <a href="{{ route('administrar') }}" class="btn btn-sm btn-primary">Administrar</a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="feature-card">
                <i class="bi bi-bar-chart-line-fill"></i>
                <h5 class="mt-2">Análisis y Reportes Estadísticos</h5>
                <p>Genere reportes ejecutivos para decisiones estratégicas.</p>
                <a href="{{ route('estadistica') }}" class="btn btn-sm btn-primary">Ver Reportes</a>
            </div>
        </div>
    </div>

    <!-- Educación -->
    <div class="row education-section align-items-center mt-5">
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <h4 class="text-primary">Compromiso con la Educación</h4>
            <p>Plataforma clave para mejorar la gestión y análisis educativo a nivel nacional.</p>
            <a href="#" class="btn btn-outline-secondary">Conocer Más Sobre el Plan</a>
        </div>
        <div class="col-12 col-md-6">
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

</body>
</html>
