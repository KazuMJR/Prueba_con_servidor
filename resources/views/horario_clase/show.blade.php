<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Detalle del Horario</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 2rem;
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            margin: 0 auto;
            padding: 1.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
            background-color: #fff;
            border-radius: 0.5rem;
        }
        .actions {
            max-width: 600px;
            margin: 1rem auto 0 auto;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="mb-4 text-center">Detalle del Horario</h1>

    <div class="card">
        <p><strong>ID:</strong> {{ $horario->id_horario }}</p>
        <p><strong>Hora Inicio:</strong> {{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}</p>
        <p><strong>Hora Fin:</strong> {{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}</p>
        <p><strong>Día:</strong> {{ $horario->dia }}</p>
        <p><strong>Aula:</strong> {{ $horario->aula }}</p>
    </div>

    <div class="actions">
        <a href="{{ route('horario_clase.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
