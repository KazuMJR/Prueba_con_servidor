<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Asignaciones</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
            <h2 class="fw-bold mb-1">Gestión de Asignaciones</h2>
            <p class="text-muted mb-0">Administre las asignaciones de cursos y catedráticos.</p>
        </div>
        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Asignación
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card p-3 mb-3">
        <form method="GET" action="{{ route('asignaciones.index') }}" class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar por código, escuela, catedrático..."
                value="{{ request('busqueda') }}"
                autocomplete="off"
            >
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filtrar
            </button>
            <a href="{{ route('asignaciones.index') }}" class="btn btn-outline-danger" id="btnCancelar">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
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

    <!-- Tabla -->
    @if($asignaciones->isEmpty())
        <div class="alert alert-info">No hay asignaciones registradas aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tablaAsignaciones">
                <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Código Inscripción</th>
                    <th>Escuela</th>
                    <th>Sección</th>
                    <th>Grado</th>
                    <th>Catedrático</th>
                    <th>Curso</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody id="asignacionesTableBody">
                @foreach ($asignaciones as $asignacion)
                    <tr>
                        <td>{{ $asignacion->id_asignacion }}</td>
                        <td>{{ $asignacion->inscripcion->codigo ?? 'N/A' }}</td>
                        <td>{{ $asignacion->escuela->nombre_escuela ?? 'N/A' }}</td>
                        <td>{{ $asignacion->seccion->letra ?? 'N/A' }}</td>
                        <td>{{ $asignacion->grado->nombre_grado ?? 'N/A' }}</td>
                        <td>{{ $asignacion->catedratico->nombre_catedratico ?? 'N/A' }}</td>
                        <td>{{ $asignacion->curso->nombre_curso ?? 'N/A' }}</td>
                        <td class="text-center">
                            <a href="{{ route('asignaciones.show', $asignacion->id_asignacion) }}" class="btn btn-outline-info btn-sm me-1" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('asignaciones.edit', $asignacion->id_asignacion) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('asignaciones.destroy', $asignacion->id_asignacion) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="d-flex justify-content-center mt-3">
            {{ $asignaciones->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

<!-- Scripts -->
<script>
    document.getElementById('busqueda').addEventListener('keyup', function () {
        var filtro = this.value.toLowerCase();
        var filas = document.querySelectorAll('#asignacionesTableBody tr');

        filas.forEach(function (fila) {
            var textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });

    setTimeout(function () {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);
</script>

<!-- Transición -->
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

    document.getElementById('btnCancelar').addEventListener('click', function () {
        window.location.href = "{{ route('asignaciones.index') }}";
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
