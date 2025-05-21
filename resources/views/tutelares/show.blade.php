<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Tutor - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Detalle Tutor</h1>

    <a href="{{ route('tutelares.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered">
        <tr>
            <th>CUI Alumno</th>
            <td>{{ $tutelar->cui_alumno }}</td>
        </tr>
        <tr>
            <th>Alumno</th>
            <td>{{ $tutelar->alumno->nombre_alumno ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>CUI Tutor</th>
            <td>{{ $tutelar->cui_tutor }}</td>
        </tr>
        <tr>
            <th>Nombre Tutor</th>
            <td>{{ $tutelar->nombre_tutor }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $tutelar->telefono }}</td>
        </tr>
    </table>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
