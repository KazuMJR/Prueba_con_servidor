<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($escuela) Editar Escuela @else Crear Escuela @endisset</title>
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
        @isset($escuela)
            <i class="bi bi-pencil-square"></i> Editar Escuela
        @else
            <i class="bi bi-building-add"></i> Crear Escuela
        @endisset
    </h1>

    <a href="{{ route('escuelas.index') }}" class="btn btn-outline-secondary mb-3">
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

    <form method="POST" action="@isset($escuela) {{ route('escuelas.update', $escuela) }} @else {{ route('escuelas.store') }} @endisset" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @isset($escuela)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="nombre_escuela" class="form-label">Nombre de la Escuela <span class="text-danger">*</span></label>
            <input type="text" name="nombre_escuela" id="nombre_escuela" class="form-control"
                   value="{{ old('nombre_escuela', $escuela->nombre_escuela ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección <span class="text-danger">*</span></label>
            <input type="text" name="direccion" id="direccion" class="form-control"
                   value="{{ old('direccion', $escuela->direccion ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="codigo_establecimiento" class="form-label">Código del Establecimiento <span class="text-danger">*</span></label>
            <input type="text" name="codigo_establecimiento" id="codigo_establecimiento" class="form-control"
                   value="{{ old('codigo_establecimiento', $escuela->codigo_establecimiento ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="zona" class="form-label">Zona <span class="text-danger">*</span></label>
            <input type="text" name="zona" id="zona" class="form-control"
                   value="{{ old('zona', $escuela->zona ?? '') }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                @isset($escuela) Actualizar @else Crear @endisset
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
