<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .fade-out {
            opacity: 1;
            transition: opacity 1s ease-out;
        }
        .fade-out.hidden {
            opacity: 0;
        }
    </style>
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4">Alumnos Registrados</h1>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ url('/') }}" class="btn btn-secondary me-2">Volver al Panel</a>
            <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Agregar Alumno</a>
        </div>

        //barra de busqueda
        <div>
            <input
                type="text"
                id="busqueda"
                name="busqueda"
                class="form-control"
                placeholder="Buscar por CUI o Nombre..."
                value="{{ $busqueda ?? '' }}"
                autocomplete="off"
            >
        </div>
    </div>

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

    @if($alumnos->isEmpty())
        <div class="alert alert-info">No hay alumnos registrados aún.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>CUI</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th style="width: 180px;">Acciones</th>
                </tr>
                </thead>
                <tbody id="alumnosTableBody">
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->cui }}</td>
                        <td>{{ $alumno->nombre_alumno }}</td>
                        <td>{{ $alumno->edad }}</td>
                        <td>{{ $alumno->sexo }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', [$alumno, 'busqueda' => $busqueda]) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('alumnos.edit', [$alumno, 'busqueda' => $busqueda]) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                            <form action="{{ route('alumnos.destroy', [$alumno, 'busqueda' => $busqueda]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este alumno?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <nav>
            {{ $alumnos->links('pagination::bootstrap-5') }}
        </nav>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<!-- Animación para ocultar mensajes -->
<script>
    window.addEventListener('DOMContentLoaded', () => {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        setTimeout(() => {
            if (successMessage) successMessage.classList.add('hidden');
            if (errorMessage) errorMessage.classList.add('hidden');
        }, 3000);
    });
</script>

<!-- Búsqueda con actualización en tiempo real -->
<script>
    document.getElementById('busqueda').addEventListener('input', function() {
        const busqueda = this.value;
        // Realizar petición GET con fetch a la misma ruta index con el parámetro busqueda
        fetch(`{{ route('alumnos.index') }}?busqueda=${encodeURIComponent(busqueda)}`)
            .then(response => response.text())
            .then(html => {
                // Extraer el tbody de la tabla de la respuesta HTML y reemplazarlo
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const nuevoTbody = doc.getElementById('alumnosTableBody');
                const tabla = document.getElementById('alumnosTableBody');
                if (nuevoTbody && tabla) {
                    tabla.innerHTML = nuevoTbody.innerHTML;
                }

                // También actualizar la paginación (opcional)
                const nuevaPaginacion = doc.querySelector('nav');
                const paginacionActual = document.querySelector('nav');
                if (nuevaPaginacion && paginacionActual) {
                    paginacionActual.innerHTML = nuevaPaginacion.innerHTML;
                }
            });
    });
</script>

</body>
</html>
