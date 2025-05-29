<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ isset($calendario) ? 'Editar Examen' : 'Agregar Examen' }} - MINEDUC</title>

    <!-- Bootstrap CSS y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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
    <h1 class="mb-4">
        @if(isset($calendario))
            <i class="bi bi-pencil-square"></i> Editar Examen
        @else
            <i class="bi bi-journal-plus"></i> Agregar Nuevo Examen
        @endif
    </h1>

    <a href="{{ route('calendarios.index') }}" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-arrow-left"></i> Volver al listado
    </a>

    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger fade-out">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($calendario) ? route('calendarios.update', $calendario->id_examen) : route('calendarios.store') }}" method="POST" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @if(isset($calendario))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha <span class="text-danger">*</span></label>
            <input
                type="date"
                name="fecha"
                id="fecha"
                class="form-control"
                value="{{ old('fecha', isset($calendario) && $calendario->fecha ? \Carbon\Carbon::parse($calendario->fecha)->format('Y-m-d') : '') }}"
                required
            />
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
            <textarea
                name="descripcion"
                id="descripcion"
                class="form-control"
                rows="4"
                required
            >{{ old('descripcion', isset($calendario) ? $calendario->descripcion : '') }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                {{ isset($calendario) ? 'Actualizar' : 'Crear' }}
            </button>
            <a href="{{ route('calendarios.index') }}" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Ocultar mensajes después de unos segundos -->
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

</body>
</html>
