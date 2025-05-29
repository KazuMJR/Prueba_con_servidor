<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tutelares</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos -->
    <style>
        .fade-out {
            transition: opacity 0.5s ease-out;
        }

        .pagination .page-link {
            padding: 0.3rem 0.6rem;
            font-size: 0.9rem;
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
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Gestión de Tutelares</h2>
            <p class="text-muted mb-0">Administre la relación entre alumnos y sus tutores.</p>
        </div>
        <a href="{{ route('tutelares.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Agregar Tutor
        </a>
    </div>


<!-- Búsqueda -->
<form method="GET" action="{{ route('tutelares.index') }}">
    <div class="card p-3 mb-3">
        <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                value="{{ request('busqueda') }}"
                placeholder="Buscar por CUI, nombre tutor o alumno..."
                autocomplete="off"
            >
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filtrar
            </button>
            <a href="{{ route('tutelares.index') }}" class="btn btn-outline-danger">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
        </div>
    </div>
</form>

<!-- Mensajes -->
@if(session('success'))
    <div id="successMessage" class="alert alert-success fade-out">{{ session('success') }}</div>
@endif

<!-- Tabla -->
<div class="table-responsive">
    <table class="table align-middle table-hover border">
        <thead class="table-light">
            <tr>
                <th>CUI Tutor</th>
                <th>Nombre Tutor</th>
                <th>Teléfono</th>
                <th>CUI Alumno</th>
                <th>Alumno</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody id="tutelaresTableBody">
            @forelse($tutelares as $tutelar)
                <tr>
                    <td><strong>{{ $tutelar->cui_tutor }}</strong></td>
                    <td>{{ $tutelar->nombre_tutor }}</td>
                    <td>{{ $tutelar->telefono }}</td>
                    <td><strong>{{ $tutelar->cui_alumno }}</strong></td>
                    <td>{{ $tutelar->alumno->nombre_alumno ?? 'N/A' }}</td>
                    <td class="text-center">
                        <a href="{{ route('tutelares.show', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" class="btn btn-outline-info btn-sm me-1" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('tutelares.edit', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('tutelares.destroy', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este tutor?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center">No hay tutelares registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Paginación -->
<div class="d-flex justify-content-center mt-3">
    {{ $tutelares->links('pagination::bootstrap-5') }}
</div>

<!-- Scripts -->
<script>
    // Filtro en tiempo real (solo visible, no afecta backend)
    document.getElementById('busqueda').addEventListener('input', function () {
        var filtro = this.value.toLowerCase();
        var filas = document.querySelectorAll('#tutelaresTableBody tr');

        filas.forEach(function (fila) {
            var texto = fila.textContent.toLowerCase();
            fila.style.display = texto.includes(filtro) ? '' : 'none';
        });
    });

    // Ocultar mensaje
    setTimeout(function () {
        document.getElementById('successMessage')?.classList.add('d-none');
    }, 3000);
</script>

</body>
</html>
