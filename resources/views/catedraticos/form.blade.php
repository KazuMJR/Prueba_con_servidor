<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($catedratico) Editar Catedrático @else Crear Catedrático @endisset</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
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
        @isset($catedratico)
            <i class="bi bi-pencil-square"></i> Editar Catedrático
        @else
            <i class="bi bi-person-plus-fill"></i> Crear Catedrático
        @endisset
    </h1>

    <a href="{{ route('catedraticos.index') }}" class="btn btn-outline-secondary mb-3">
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

    <form method="POST" action="@isset($catedratico) {{ route('catedraticos.update', $catedratico) }} @else {{ route('catedraticos.store') }} @endisset" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @isset($catedratico)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="cui" class="form-label">CUI <span class="text-danger">*</span></label>
            <input type="text" name="cui" id="cui" class="form-control"
                   value="{{ old('cui', $catedratico->cui ?? '') }}"
                   @isset($catedratico) readonly @endisset required>
        </div>

        <div class="mb-3">
            <label for="nombre_catedratico" class="form-label">Nombre del Catedrático <span class="text-danger">*</span></label>
            <input type="text" name="nombre_catedratico" id="nombre_catedratico" class="form-control"
                   value="{{ old('nombre_catedratico', $catedratico->nombre_catedratico ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad <span class="text-danger">*</span></label>
            <input type="number" name="edad" id="edad" class="form-control"
                   value="{{ old('edad', $catedratico->edad ?? '') }}" required min="1">
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo <span class="text-danger">*</span></label>
            <select name="sexo" id="sexo" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="M" {{ old('sexo', $catedratico->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('sexo', $catedratico->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i>
                @isset($catedratico) Actualizar @else Crear @endisset
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Animación para ocultar los mensajes -->
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
