<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($seccion) ? 'Editar Sección' : 'Crear Sección' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS y Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

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
        @if(isset($seccion))
            <i class="bi bi-pencil-square"></i> Editar Sección
        @else
            <i class="bi bi-journal-plus"></i> Crear Sección
        @endif
    </h1>

    <a href="{{ route('secciones.index') }}" class="btn btn-outline-secondary mb-3">
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

    <form method="POST" action="{{ isset($seccion) ? route('secciones.update', $seccion) : route('secciones.store') }}" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @if(isset($seccion))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="letra" class="form-label">Letra <span class="text-danger">*</span></label>
            <input type="text" name="letra" id="letra" maxlength="1" class="form-control" 
                   value="{{ old('letra', $seccion->letra ?? '') }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> {{ isset($seccion) ? 'Actualizar' : 'Crear' }}
            </button>
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
