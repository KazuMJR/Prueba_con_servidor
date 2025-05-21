<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Crear Horario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    <h1 class="mb-4">Crear Horario</h1>

    <a href="{{ route('horario_clase.index') }}" class="btn btn-secondary mb-3">Volver al listado</a>

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

    <form action="{{ route('horario_clase.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio') }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora Fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin') }}" required>
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input type="text" name="dia" id="dia" class="form-control" maxlength="10" value="{{ old('dia') }}" required>
        </div>

        <div class="mb-3">
            <label for="aula" class="form-label">Aula</label>
            <input type="text" name="aula" id="aula" class="form-control" maxlength="15" value="{{ old('aula') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('horario_clase.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
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

</body>
</html>
