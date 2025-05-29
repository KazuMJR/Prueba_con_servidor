<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catedráticos Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
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

        .pagination .page-link {
            padding: 0.3rem 0.6rem;
            font-size: 0.9rem;
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

<!-- Contenido -->
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Catedráticos Registrados</h2>
            <p class="text-muted mb-0">Administre la información de los catedráticos del sistema.</p>
        </div>
        <a href="{{ route('catedraticos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Agregar Catedrático
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card p-3 mb-3">
        <form method="GET" action="{{ route('catedraticos.index') }}" class="d-flex gap-2 flex-wrap" id="formBusqueda">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar por CUI o Nombre..."
                autocomplete="off"
                value="{{ request('busqueda') }}"
            >
            <button type="submit" class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filtrar
            </button>
            <button type="button" class="btn btn-outline-danger" id="btnCancelar">
                <i class="bi bi-x-circle"></i> Cancelar
            </button>
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
    @if($catedraticos->isEmpty())
        <div class="alert alert-warning">No hay catedráticos registrados aún.</div>
    @else
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
                <tbody id="tablaCatedraticos">
                    @foreach($catedraticos as $catedratico)
                        <tr>
                            <td><strong>{{ $catedratico->cui }}</strong></td>
                            <td>{{ $catedratico->nombre_catedratico }}</td>
                            <td>{{ $catedratico->edad }}</td>
                            <td>{{ $catedratico->sexo }}</td>
                            <td class="text-center">
                                <a href="{{ route('catedraticos.show', $catedratico) }}" class="btn btn-outline-info btn-sm me-1" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('catedraticos.edit', $catedratico) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('catedraticos.destroy', $catedratico) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este catedrático?')">
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
            {{ $catedraticos->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

<!-- Scripts -->
<script>
    // Filtro en tiempo real (solo filtra lo que ya está cargado)
    document.getElementById('busqueda').addEventListener('input', function () {
        var filtro = this.value.toLowerCase();
        var filas = document.querySelectorAll('#tablaCatedraticos tr');
        filas.forEach(function (fila) {
            var textoFila = fila.textContent.toLowerCase();
            fila.style.display = textoFila.includes(filtro) ? '' : 'none';
        });
    });

    // Ocultar mensajes automáticamente después de 3 segundos
    setTimeout(function () {
        document.getElementById('successMessage')?.classList.add('d-none');
        document.getElementById('errorMessage')?.classList.add('d-none');
    }, 3000);

    // Animación simple para navegación suave (fade out / fade in)
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
</script>

<script>
    document.getElementById('btnCancelar').addEventListener('click', function() {
        // Limpia el input
        document.getElementById('busqueda').value = '';
        // Envía el formulario sin parámetros para recargar la página sin filtros
        document.getElementById('formBusqueda').submit();
    });
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
