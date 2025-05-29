<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Gestión de Horarios - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .grade-card {
            border: 1px solid #dee2e6;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            transition: transform 0.2s ease;
        }
        .grade-card:hover {
            transform: scale(1.01);
        }
        .fade-transition {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .fade-out {
            transition: opacity 0.5s ease-out;
        }
         .btn-detail {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            transition: background-color 0.2s ease;
        }
        .btn-detail:hover {
            background-color: #e2e6ea;
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

        .fade-transition {
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .fade-out {
            transition: opacity 0.5s ease-out;
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
            <h2 class="fw-bold mb-1">Gestión de Horarios</h2>
            <p class="text-muted mb-0">Administre los horarios registrados.</p>
        </div>
        <a href="{{ route('horario_clase.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Crear Horario
        </a>
    </div>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('horario_clase.index') }}" class="card p-3 mb-3">
        <div class="d-flex gap-2 flex-wrap">
            <input type="text" name="busqueda" id="busqueda" class="form-control" placeholder="Buscar por hora, día o aula..." value="{{ $busqueda }}" autocomplete="off">
            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i> Buscar</button>
            <a href="{{ route('horario_clase.index') }}" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Cancelar</a>
        </div>
    </form>

    <!-- Mensajes -->
    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div id="errorMessage" class="alert alert-danger fade-out">{{ session('error') }}</div>
    @endif

    <!-- Horarios -->
    @if($horarios->isEmpty())
        <div class="alert alert-warning">No hay horarios registrados aún.</div>
    @else
        <div id="horariosContainer" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
            @foreach($horarios as $horario)
                <div class="col horario-item">
                    <div class="card grade-card h-100 p-1">
                        <div class="card-body py-2 px-3">
                            <p class="mb-1"><strong>Día:</strong> {{ $horario->dia }}</p>
                            <p class="mb-1"><strong>Hora inicio:</strong> {{ $horario->hora_inicio }}</p>
                            <p class="mb-1"><strong>Hora fin:</strong> {{ $horario->hora_fin }}</p>
                            <p class="mb-1"><strong>Aula:</strong> {{ $horario->aula }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-1 px-3">
                            <a href="{{ route('horario_clase.show', $horario) }}" class="btn btn-detail btn-sm w-100 mb-2">Ver Detalles</a>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('horario_clase.edit', $horario) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('horario_clase.destroy', $horario) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este horario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div class="text-muted">Mostrando {{ $horarios->count() }} de {{ $horarios->total() }} horarios.</div>
            <div>{{ $horarios->withQueryString()->links('pagination::bootstrap-5') }}</div>
        </div>
    @endif
</div>

<script>
    // Filtro en tiempo real
    document.getElementById('busqueda').addEventListener('input', function () {
        const filtro = this.value.toLowerCase();
        const tarjetas = document.querySelectorAll('.horario-item');
        tarjetas.forEach(function (tarjeta) {
            const texto = tarjeta.textContent.toLowerCase();
            tarjeta.style.display = texto.includes(filtro) ? '' : 'none';
        });
    });

    // Ocultar mensajes después de 3 segundos
    setTimeout(() => {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
