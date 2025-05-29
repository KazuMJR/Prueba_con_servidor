<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Calendario de Exámenes - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .fade-out {
            transition: opacity 0.5s ease-out;
        }
        .pagination .page-link {
            padding: 0.3rem 0.6rem;
            font-size: 0.9rem;
        }
        /* Navbar styles similar a alumnos */
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
        @media (min-width: 992px) {
            .navbar-nav {
                flex-wrap: wrap;
            }
            .navbar-collapse {
                justify-content: flex-end;
            }
        }
        /* Transición suave para el body */
        .fade-transition {
            transition: opacity 0.3s ease-in-out;
            opacity: 1;
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
                    <a class="nav-link" href="{{ route('programas.index') }}"><i class="bi bi-easel-fill"></i> Programas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actividades.index') }}"><i class="bi bi-lightning-fill"></i> Actividades</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido -->
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Calendario de Exámenes</h2>
            <p class="text-muted mb-0">Administre los exámenes registrados.</p>
        </div>
        <a href="{{ route('calendarios.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Agregar Examen
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card p-3 mb-3">
        <form method="GET" action="{{ route('calendarios.index') }}" class="d-flex justify-content-start align-items-center gap-2 flex-wrap" id="formBusqueda">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar por ID, fecha o descripción..."
                value="{{ request('busqueda') }}"
                autocomplete="off"
            />
            <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-funnel"></i> Filtrar</button>
            <button type="button" id="btnCancelar" class="btn btn-outline-danger">
                <i class="bi bi-x-circle"></i> Cancelar
            </button>
        </form>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div id="errorMessage" class="alert alert-danger fade-out">{{ session('error') }}</div>
    @endif

    <!-- Tabla -->
    @if($examenes->isEmpty())
        <div class="alert alert-info">No hay exámenes registrados aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th style="width: 180px;">Acciones</th>
                    </tr>
                </thead>
                <tbody id="examenesTableBody">
                    @foreach($examenes as $examen)
                        <tr>
                            <td>{{ $examen->id_examen }}</td>
                            <td>{{ \Carbon\Carbon::parse($examen->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $examen->descripcion }}</td>
                            <td class="text-center">
                                <a href="{{ route('calendarios.show', $examen->id_examen) }}" class="btn btn-outline-info btn-sm me-1" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('calendarios.edit', $examen->id_examen) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('calendarios.destroy', $examen->id_examen) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este examen?')">
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
            {{ $examenes->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

<!-- Scripts -->
<script>
    // Búsqueda en tiempo real en tabla (filtrado desde cliente)
    document.getElementById('busqueda').addEventListener('keyup', function () {
        var filtro = this.value.toLowerCase();
        var filas = document.querySelectorAll('#examenesTableBody tr');

        filas.forEach(function (fila) {
            var textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });

    // Ocultar mensajes automáticamente después de 3 segundos
    setTimeout(() => {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);
</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.body.classList.add("fade-transition");
        document.body.style.opacity = 1;

        // Animación para enlaces internos
        const links = document.querySelectorAll("a[href]");
        links.forEach(link => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (!href.startsWith('#') && this.target !== "_blank") {
                    e.preventDefault();
                    document.body.style.opacity = 0;
                    setTimeout(() => window.location.href = href, 300);
                }
            });
        });

        // Botón cancelar con animación
        const btnCancelar = document.getElementById('btnCancelar');
        if (btnCancelar) {
            btnCancelar.addEventListener('click', () => {
                document.body.style.opacity = 0;
                setTimeout(() => {
                    window.location.href = "{{ route('calendarios.index') }}";
                }, 300);
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
