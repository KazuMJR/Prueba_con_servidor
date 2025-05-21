<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/principal.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>

<header class="navbar">
    <div class="logo">MINEDUC</div>
    <nav class="nav-links">
        @foreach([ 'escuelas', 'alumnos', 'catedraticos', 'grados', 'secciones', 'cursos', 'programas', 'inscripciones', 'tutelares', 'horario_clase', 'calendarios', 'asignaciones', 'actividades' ] as $entidad)
            <a href="{{ route($entidad . '.index') }}">{{ ucfirst($entidad) }}</a>
        @endforeach
    </nav>
</header>

<main class="container">
    <h1 class="page-title">Panel Principal - MINEDUC</h1>
    <section class="card-grid">
        @foreach([ 'escuelas', 'alumnos', 'catedraticos', 'grados', 'secciones', 'cursos', 'programas', 'inscripciones', 'tutelares', 'horario_clase', 'calendarios', 'asignaciones', 'actividades' ] as $entidad)
            <div class="card">
                <h2>{{ ucfirst($entidad) }}</h2>
                <p>Gestión y visualización de {{ $entidad }}.</p>
                <a href="{{ route($entidad . '.index') }}" class="btn">Ver Módulo</a>
            </div>
        @endforeach
    </section>
</main>

</body>
</html>
