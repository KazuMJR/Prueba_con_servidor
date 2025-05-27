<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Alumnos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilo opcional para desvanecer mensajes -->
    <style>
        .fade-out {
            transition: opacity 0.5s ease-out;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Gestión de Alumnos</h2>
            <p class="text-muted mb-0">Administre la información de los estudiantes del sistema.</p>
        </div>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Registrar Nuevo Alumno
        </a>
    </div>

    <!-- Barra de búsqueda -->
    <div class="card p-3 mb-3">
        <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar alumno por nombre, ID o escuela..."
                value="{{ $busqueda ?? '' }}"
                autocomplete="off"
            >
            <button class="btn btn-outline-secondary">
                <i class="bi bi-funnel"></i> Filtrar
            </button>
        </div>
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

    <!-- Tabla de alumnos -->
    <div class="table-responsive">
        <table class="table align-middle table-hover border">
            <thead class="table-light">
                <tr>
                    <th>ID Alumno</th>
                    <th>Nombre Completo</th>
                    <th>Grado</th>
                    <th>Sección</th>
                    <th>Escuela</th>
                    <th>Estado</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody id="alumnosTableBody">
                @forelse($alumnos as $alumno)
                    <tr>
                        <td><strong>{{ $alumno->id }}</strong></td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->grado }}</td>
                        <td>{{ $alumno->seccion }}</td>
                        <td>{{ $alumno->escuela }}</td>
                        <td>
                            @if($alumno->estado === 'Activo')
                                <span class="badge bg-success">Activo</span>
                            @else
                                <span class="badge bg-danger">Retirado</span>
                            @endif
                        </td>
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
                        <td colspan="7" class="text-center">No se encontraron alumnos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div id="paginacionContenedor">
        {{ $alumnos->links() }}
    </div>
</div>

<!-- Scripts -->
<script>
    // Filtro en tiempo real
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
</script>

<!-- Bootstrap Bundle JS (opcional para tooltips/modales) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
