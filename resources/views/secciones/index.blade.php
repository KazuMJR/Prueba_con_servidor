<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Secciones - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

 <style>
    .section-card {
        border: 1px solid #dee2e6;
        border-radius: 10px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        transition: transform 0.15s ease;
        font-size: 0.85rem; /* Reduce tamaño general */
        padding: 0.4rem; /* Añadido padding más pequeño para mejor contenido */
    }
    .section-card:hover {
        transform: scale(1.02);
    }
    .section-letter {
        color: #0d6efd;
        font-weight: 700;
        font-size: 1rem; /* Más pequeño */
        margin-bottom: 0.25rem;
    }
    .btn-detail {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        font-size: 0.75rem; /* Botón más pequeño */
        padding: 0.25rem 0.5rem;
        transition: background-color 0.2s ease;
    }
    .btn-detail:hover {
        background-color: #e2e6ea;
    }
    .fade-transition {
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }
    .fade-out {
        transition: opacity 0.5s ease-out;
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
    .pagination .page-link {
        padding: 0.3rem 0.6rem;
        font-size: 0.9rem;
    }
    /* Ajustes para el footer de la tarjeta y botones */
    .section-card .card-footer {
        padding: 0.3rem 0.75rem;
    }
    .section-card .btn-sm {
        font-size: 0.7rem;
        padding: 0.2rem 0.5rem;
    }
    .d-flex.justify-content-between > a.btn-sm,
    .d-flex.justify-content-between > form > button.btn-sm {
        padding: 0.2rem 0.4rem;
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

<div class="container py-4">

    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Gestión de Secciones</h2>
            <p class="text-muted mb-0">Administre las secciones registradas.</p>
        </div>
        <a href="{{ route('secciones.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Agregar Sección
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card p-3 mb-3">
        <form method="GET" action="{{ route('secciones.index') }}">
            <div class="d-flex gap-2 flex-wrap">
                <input
                    type="text"
                    name="busqueda"
                    id="busqueda"
                    class="form-control"
                    placeholder="Buscar por letra de sección..."
                    value="{{ request('busqueda') }}"
                    autocomplete="off"
                >
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i> Buscar
                </button>
                <button type="button" class="btn btn-outline-danger" id="btnCancelar">
                    <i class="bi bi-x-circle"></i> Cancelar
                </button>
            </div>
        </form>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div id="errorMessage" class="alert alert-danger fade-out">
            {{ session('error') }}
        </div>
    @endif

    <!-- Tarjetas de secciones -->
    @if($secciones->isEmpty())
        <div class="alert alert-warning">No hay secciones registradas aún.</div>
    @else
        <div id="seccionesContainer" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($secciones as $seccion)
                <div class="col seccion-item">
                    <div class="card section-card h-100 p-1">
                        <div class="card-body py-2 px-3">
                            <h6 class="section-letter mb-1">{{ $seccion->letra }}</h6>
                            <p class="text-muted mb-1 small"><strong>ID:</strong> {{ $seccion->id_seccion }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-1 px-3">
                            <a href="{{ route('secciones.show', $seccion) }}" class="btn btn-detail btn-sm w-100 mb-2">
                                Ver Detalles
                            </a>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('secciones.edit', $seccion) }}" class="btn btn-sm btn-outline-primary px-2 py-1">
                                    Editar
                                </a>
                                <form action="{{ route('secciones.destroy', $seccion) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta sección?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger px-2 py-1">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">
                Mostrando {{ $secciones->count() }} de {{ $secciones->total() }} secciones.
            </div>
            <div>
                {{ $secciones->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Filtro en tiempo real y mensajes -->
<script>
    document.getElementById('busqueda').addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        const tarjetas = document.querySelectorAll('.seccion-item');

        tarjetas.forEach(function (tarjeta) {
            const texto = tarjeta.textContent.toLowerCase();
            tarjeta.style.display = texto.includes(filtro) ? '' : 'none';
        });
    });

    setTimeout(() => {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);

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

    document.getElementById('btnCancelar').addEventListener('click', function() {
        // Redirige a la ruta sin parámetros para limpiar filtro
        window.location.href = "{{ route('secciones.index') }}";
    });
</script>

</body>
</html>
