@php
    $esAjax = request()->ajax();
@endphp

@if(!$esAjax)
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
@endif

@include('alumnos.partials.table')

@if(!$esAjax)
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputBusqueda = document.getElementById('busqueda');
    const tablaCuerpo = document.getElementById('alumnosTableBody');
    const paginacionContenedor = document.getElementById('paginacionContenedor');

    function fetchAlumnos(url) {
        fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(html => {
            tablaCuerpo.innerHTML = html;

            // Volver a asignar eventos a los links de paginación que están en el html del tbody + paginación
            asignarEventosPaginacion();
        });
    }

    // Al escribir en el input buscar
    inputBusqueda.addEventListener('input', () => {
        const busqueda = inputBusqueda.value;
        const url = new URL("{{ route('alumnos.index') }}", window.location.origin);
        url.searchParams.set('busqueda', busqueda);
        url.searchParams.set('page', 1);

        fetchAlumnos(url.href);
    });

    // Agregar evento click a los links de paginación
    function asignarEventosPaginacion() {
        const links = document.querySelectorAll('#paginacionContenedor a');
        links.forEach(link => {
            link.addEventListener('click', e => {
                e.preventDefault();
                fetchAlumnos(link.href);
            });
        });
    }

    // Inicializar eventos paginacion al cargar
    asignarEventosPaginacion();

    // Animación mensajes
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');
    setTimeout(() => {
        if (successMessage) successMessage.classList.add('hidden');
        if (errorMessage) errorMessage.classList.add('hidden');
    }, 3000);
});
</script>

</body>
</html>
@endif
