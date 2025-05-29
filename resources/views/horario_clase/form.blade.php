<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>
        @isset($horario)
            Editar Horario
        @else
            Crear Horario
        @endisset
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        @isset($horario)
            <i class="bi bi-pencil-square"></i> Editar Horario
        @else
            <i class="bi bi-journal-plus"></i> Crear Horario
        @endisset
    </h1>

    <a href="{{ route('horario_clase.index') }}" class="btn btn-outline-secondary mb-3">
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

    <form method="POST" 
          action="@isset($horario) {{ route('horario_clase.update', $horario) }} @else {{ route('horario_clase.store') }} @endisset"
          class="border p-4 rounded shadow-sm bg-light">

        @csrf
        @isset($horario)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora Inicio <span class="text-danger">*</span></label>
            <select name="hora_inicio" id="hora_inicio" class="form-select form-select-sm" required>
                <option value="">Seleccione hora</option>
                @for ($h = 0; $h < 24; $h++)
                    @foreach(['00', '30'] as $m)
                        @php
                            $hourFormatted = sprintf('%02d:%s', $h, $m);
                            $selected = old('hora_inicio', isset($horario) ? substr($horario->hora_inicio, 0, 5) : '') == $hourFormatted ? 'selected' : '';
                        @endphp
                        <option value="{{ $hourFormatted }}" {{ $selected }}>
                            {{ $hourFormatted }}
                        </option>
                    @endforeach
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora Fin <span class="text-danger">*</span></label>
            <select name="hora_fin" id="hora_fin" class="form-select form-select-sm" required>
                <option value="">Seleccione hora</option>
                @for ($h = 0; $h < 24; $h++)
                    @foreach(['00', '30'] as $m)
                        @php
                            $hourFormatted = sprintf('%02d:%s', $h, $m);
                            $selected = old('hora_fin', isset($horario) ? substr($horario->hora_fin, 0, 5) : '') == $hourFormatted ? 'selected' : '';
                        @endphp
                        <option value="{{ $hourFormatted }}" {{ $selected }}>
                            {{ $hourFormatted }}
                        </option>
                    @endforeach
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día <span class="text-danger">*</span></label>
            <select name="dia" id="dia" class="form-select form-select-sm" required>
                <option value="">Seleccione día</option>
                @php
                    $diasSemana = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
                    $diaSeleccionado = old('dia', $horario->dia ?? '');
                @endphp
                @foreach ($diasSemana as $dia)
                    <option value="{{ $dia }}" {{ $diaSeleccionado == $dia ? 'selected' : '' }}>
                        {{ $dia }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="aula" class="form-label">Aula <span class="text-danger">*</span></label>
            <input type="text" name="aula" id="aula" class="form-control" maxlength="15" 
                   value="{{ old('aula', $horario->aula ?? '') }}" required>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> 
                @isset($horario) Actualizar @else Guardar @endisset
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS Bundle -->
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
