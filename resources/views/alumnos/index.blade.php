<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Gestión de Alumnos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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
                <li class="nav-item"><a class="nav-link" href="{{ route('inscripciones.index') }}"><i class="bi bi-card-checklist"></i> Inscripciones</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tutelares.index') }}"><i class="bi bi-person-hearts"></i> Tutelares</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-4">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <div>
            <h2 class="fw-bold mb-1">Gestión de Alumnos</h2>
            <p class="text-muted mb-0">Administre la información de los estudiantes del sistema.</p>
        </div>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary mt-2 mt-lg-0">
            <i class="bi bi-plus-circle"></i> Registrar Nuevo Alumno
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <form method="GET" action="{{ route('alumnos.index') }}" class="card p-3 mb-3">
        <div class="d-flex justify-content-start align-items-center gap-2 flex-wrap">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar por CUI o Nombre..."
                value="{{ request('busqueda') }}"
                autocomplete="off"
            />
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filtrar
            </button>
            <button type="button" class="btn btn-outline-danger" id="btnCancelar">
                <i class="bi bi-x-circle"></i> Cancelar
            </button>
        </div>
    </form>

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

    <!-- Tabla de alumnos -->
    <div class="table-responsive">
        <table class="table align-middle table-hover border">
            <thead class="table-light">
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="alumnosTableBody">
                @forelse($alumnos as $alumno)
                    <tr>
                        <td><strong>{{ $alumno->cui }}</strong></td>
                        <td>{{ $alumno->nombre_alumno }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>{{ $alumno->sexo }}</td>
                        <td class="text-center">
                            <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-outline-info btn-sm me-1" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este alumno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No se encontraron alumnos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-3">
        {{ $alumnos->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Scripts -->
<script>
    // Filtro en tiempo real (cliente)
    document.getElementById('busqueda').addEventListener('keyup', function () {
        var filtro = this.value.toLowerCase();
        var filas = document.querySelectorAll('#alumnosTableBody tr');

        filas.forEach(function (fila) {
            var textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });

    // Ocultar mensajes después de 3 segundos
    setTimeout(function () {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);

    // Cancelar filtro y recargar sin parámetros
    document.getElementById('btnCancelar').addEventListener('click', function() {
        window.location.href = "{{ route('alumnos.index') }}";
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Transición de fade in/out para navegación entre páginas
    document.addEventListener("DOMContentLoaded", () => {
        document.body.classList.add("fade-transition");
        document.body.style.opacity = 1;

        const links = document.querySelectorAll("a[href]");
        links.forEach(link => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (!href.startsWith('#') && this.target !== "_blank" && !href.startsWith('mailto:')) {
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
