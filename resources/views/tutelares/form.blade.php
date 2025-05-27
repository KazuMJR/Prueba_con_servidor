<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($tutelar) <i class="bi bi-pencil-square"></i> Editar Tutor @else <i class="bi bi-person-plus-fill"></i> Agregar Tutor @endisset</title>
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
        @isset($tutelar)
            <i class="bi bi-pencil-square"></i> Editar Tutor
        @else
            <i class="bi bi-person-plus-fill"></i> Agregar Tutor
        @endisset
    </h1>

    <a href="{{ route('tutelares.index') }}" class="btn btn-outline-secondary mb-3">
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

    <form method="POST" action="@isset($tutelar) {{ route('tutelares.update', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }} @else {{ route('tutelares.store') }} @endisset" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @isset($tutelar)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="cui_alumno" class="form-label">Alumno <span class="text-danger">*</span></label>
            @isset($tutelar)
                <input type="text" class="form-control" value="{{ $tutelar->cui_alumno }} - {{ $tutelar->alumno->nombre_alumno ?? '' }}" disabled>
                <input type="hidden" name="cui_alumno" value="{{ $tutelar->cui_alumno }}">
            @else
                <select name="cui_alumno" id="cui_alumno" class="form-select" required>
                    <option value="">-- Seleccione un alumno --</option>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->cui }}" {{ old('cui_alumno') == $alumno->cui ? 'selected' : '' }}>
                            {{ $alumno->nombre_alumno }} ({{ $alumno->cui }})
                        </option>
                    @endforeach
                </select>
            @endisset
        </div>

        <div class="mb-3">
            <label for="cui_tutor" class="form-label">CUI Tutor <span class="text-danger">*</span></label>
            <input type="text" name="cui_tutor" id="cui_tutor" class="form-control"
                   value="{{ old('cui_tutor', $tutelar->cui_tutor ?? '') }}" {{ isset($tutelar) ? 'readonly' : 'required' }}>
        </div>

        <div class="mb-3">
            <label for="nombre_tutor" class="form-label">Nombre Tutor <span class="text-danger">*</span></label>
            <input type="text" name="nombre_tutor" id="nombre_tutor" class="form-control"
                   value="{{ old('nombre_tutor', $tutelar->nombre_tutor ?? '') }}" required maxlength="60">
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control"
                   value="{{ old('telefono', $tutelar->telefono ?? '') }}" maxlength="15">
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> @isset($tutelar) Actualizar @else Guardar @endisset
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
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
