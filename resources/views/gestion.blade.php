<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Gestión de Alumnos - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons (solo los usados) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
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
            color: black;
            margin-bottom: 0.5rem;
        }

        .feature-description {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 1rem;
            min-height: 48px;
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
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Logotipo-MINEDUC-2024-2028_AZUL_H.png/330px-Logotipo-MINEDUC-2024-2028_AZUL_H.png" alt="Logo MINEDUC" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('principal') }}"><i class="bi bi-house-fill"></i> Principal</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('estadistica') }}"><i class="bi bi-speedometer2"></i> Estadísticas</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('alumnos.index') }}"><i class="bi bi-people-fill"></i> Alumnos</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('inscripciones.index') }}"><i class="bi bi-card-checklist"></i> Inscripciones</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tutelares.index') }}"><i class="bi bi-person-hearts"></i> Tutelares</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container py-5">
    <div class="page-header">
        <h1>Gestión de Alumnos</h1>
        <p class="lead">Aquí podrás gestionar los alumnos, inscripciones y tutelares.</p>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-people-fill"></i>
                <div class="feature-description">Listado y control de los alumnos registrados.</div>
                <a href="{{ route('alumnos.index') }}" class="btn btn-outline-primary w-100">Ver Alumnos</a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
    <div class="feature-card">
             <i class="bi bi-card-checklist"></i>
             <div class="feature-description">Manejo de inscripciones académicas.</div>
             <a href="{{ route('inscripciones.index') }}" class="btn btn-outline-success w-100">Ver Inscripciones</a>
        </div>
    </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="feature-card">
                <i class="bi bi-person-hearts"></i>
                <div class="feature-description">Gestión de encargados o tutelares de los alumnos.</div>
                <a href="{{ route('tutelares.index') }}" class="btn btn-outline-info w-100">Ver Tutelares</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
