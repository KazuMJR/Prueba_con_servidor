<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@isset($alumno) Editar Alumno @else Crear Alumno @endisset</title>
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
    <h1 class="mb-4">@isset($alumno) Editar Alumno @else Crear Alumno @endisset</h1>

    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mb-3">Volver al listado</a>

    @if(session('success'))
        <div id="successMessage" class="alert alert-success fade-out">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div id="errorMessage" class="alert alert-danger fade-out">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="@isset($alumno) {{ route('alumnos.update', $alumno) }} @else {{ route('alumnos.store') }} @endisset">
        @csrf
        @isset($alumno)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="cui" class="form-label">CUI</label>
            <input type="text" name="cui" id="cui" class="form-control"
                   value="{{ old('cui', $alumno->cui ?? '') }}"
                   @isset($alumno) readonly @endisset required>
        </div>

        <div class="mb-3">
            <label for="nombre_alumno" class="form-label">Nombre del Alumno</label>
            <input type="text" name="nombre_alumno" id="nombre_alumno" class="form-control"
                   value="{{ old('nombre_alumno', $alumno->nombre_alumno ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control"
                   value="{{ old('edad', $alumno->edad ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select name="sexo" id="sexo" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="M" {{ old('sexo', $alumno->sexo ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('sexo', $alumno->sexo ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            @isset($alumno) Actualizar @else Crear @endisset
        </button>
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
        }, 3000); // Ocultar después de 3 segundos
    });
</script>
</body>
</html>
