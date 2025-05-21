<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Panel Principal - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        main.container {
            flex: 1 0 auto;
            padding: 3rem 1rem 2rem; /* menos espacio abajo porque footer no fijo */
        }

        .page-title {
            font-weight: 800;
            margin-bottom: 2rem;
            text-align: center;
        }

        .content-container {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: nowrap;
        }

        .left-col, .right-col {
            flex: 0 0 23%;
            max-width: 23%;
            min-width: 200px;
        }

        .center-col {
            flex: 0 0 50%;
            max-width: 50%;
            min-width: 300px;
            text-align: center;
            padding: 0 1rem;
        }

        .transparent-box {
            background-color: transparent !important;
        }

        #graficoEdades {
            width: 100% !important;
            height: 400px !important;
        }

        .right-col img {
            width: 100%;
            margin-bottom: 1rem;
            display: block;
            border-radius: 5px;
            transition: opacity 0.3s ease; /* transición suave */
        }
        /* Hover: imágenes ligeramente transparentes */
        .right-col img:hover {
            opacity: 0.7;
            cursor: pointer;
        }

        .mission-vision {
            color: #212529;
            font-weight: 600;
        }

        /* Pie de página estático, no fijo */
        footer.footer-image-container {
            width: 100%;
            height: 120px; /* altura visible del pie */
            overflow: hidden;
            background: #fff;
            border-top: 1px solid #ccc;
            flex-shrink: 0;
        }

        footer.footer-image-container img {
            width: 100%;
            height: 160px; /* altura mayor para recortar */
            object-fit: cover;
            object-position: bottom;
            display: block;
        }

        /* Ajuste logo en navbar */
        .navbar-brand img {
            height: 80px; /* tamaño doble del original */
            width: auto;
        }

        /* Ajustar altura del navbar para que no corte el logo */
        nav.navbar {
            min-height: 90px; /* un poco más que la altura del logo */
            padding-top: 10px;
            padding-bottom: 10px;
        }

        /* Ajustar el toggler vertical alineación para navbar más alta */
        .navbar-toggler {
            margin-top: 15px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Logotipo-MINEDUC-2024-2028_AZUL_H.png/330px-Logotipo-MINEDUC-2024-2028_AZUL_H.png" alt="MINEDUC Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <!-- Dropdown Agrupado 1 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Gestión Escolar
                    </a>
                    <ul class="dropdown-menu">
                        @foreach([
                            'escuelas', 'alumnos', 'catedraticos', 'grados', 'secciones',
                            'inscripciones', 'tutelares', 'asignaciones'
                        ] as $entidad)
                            <li><a class="dropdown-item" href="{{ route($entidad . '.index') }}">{{ ucfirst($entidad) }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <!-- Dropdown Agrupado 2 -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Otros Módulos
                    </a>
                    <ul class="dropdown-menu">
                        @foreach([
                            'cursos', 'horario_clase', 'programas', 'calendarios', 'actividades'
                        ] as $entidad)
                            <li><a class="dropdown-item" href="{{ route($entidad . '.index') }}">
                                    {{ $entidad == 'horario_clase' ? 'Horario Clase' : ucfirst($entidad) }}
                                </a></li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Main Content -->
<main class="container">

    <div class="content-container">

        <!-- Gráfico a la izquierda -->
        <div class="left-col transparent-box">
            <h2 class="mb-4">Estadística de Alumnos por Edad</h2>
            <canvas id="graficoEdades"></canvas>
        </div>

        <!-- Misión y Visión en el centro -->
        <div class="center-col transparent-box mission-vision">
            <h3>Misión:</h3>
            <p>
                Formar integralmente a niños en sobre edad, niños trabajadores, jóvenes y adultos que no han tenido acceso a la educación escolar y a las que habiéndola tenido desean ampliarlas, mediante modalidades y servicios educativos diversificados, flexibles y abiertos con la participación de la Sociedad.
            </p>

            <h3>Visión:</h3>
            <p>
                La DIGEEX es la instancia, eficiente, pertinente y oportuna, que impulsa la educación permanente de la persona y que funciona como el engranaje de los esfuerzos emprendidos por el Ministerio de Educación, ONG y otras OG en la prestación de servicios de educación extraescolar a jóvenes y adultos.
            </p>
        </div>

        <!-- Imágenes a la derecha -->
        <div class="right-col transparent-box">
            <img src="https://www.guatemala.com/fotos/2024/12/Carreras-autorizadas-en-Guatemala-2025-MINEDUC.jpg" alt="Carreras autorizadas Guatemala 2025" />
            <img src="https://www.guatemala.com/fotos/2024/12/Inicio-de-clases-2025-en-Guatemala-Mineduc-publico-fechas-oficiales.jpg" alt="Inicio de clases Guatemala 2025" />
        </div>

    </div>

</main>

<!-- Pie de página estático -->
<footer class="footer-image-container">
    <img src="https://digital.mineduc.gob.gt/static/mineduc-theme/images/landing-page.80dc37813ca7.jpg" alt="Mineduc footer" />
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('graficoEdades').getContext('2d');

    // Usar la variable enviada desde Laravel
    const edades = @json($estadisticasEdades->keys());
    const cantidades = @json($estadisticasEdades->values());

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: edades,
            datasets: [{
                label: 'Cantidad de alumnos',
                data: cantidades,
                backgroundColor: 'rgba(13, 110, 253, 0.5)',
                borderColor: 'rgba(13, 110, 253, 1)',
                borderWidth: 1
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Edad'
                    }
                }
            }
        }
    });
</script>

</body>
</html>
