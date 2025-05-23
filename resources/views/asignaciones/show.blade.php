<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Asignación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Detalle de Asignación #{{ $asignacion->id_asignacion }}</h1>

    <table class="table table-bordered">
        <tbody>
        <tr>
            <th>ID</th>
            <td>{{ $asignacion->id_asignacion }}</td>
        </tr>
        <tr>
            <th>Código de Inscripción</th>
            <td>{{ $asignacion->inscripcion_codigo }}</td>
        </tr>
        <tr>
            <th>Escuela</th>
            <td>{{ $asignacion->escuela->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Sección</th>
            <td>{{ $asignacion->seccion->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Grado</th>
            <td>{{ $asignacion->grado->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Catedrático</th>
            <td>{{ $asignacion->catedratico->nombre ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Curso</th>
            <td>{{ $asignacion->curso->nombre ?? 'N/A' }}</td>
        </tr>
        </tbody>
    </table>

    <a href="{{ route('asignaciones.index') }}" class="btn btn-secondary">Volver a la lista</a>
    <a href="{{ route('asignaciones.edit', $asignacion->id_asignacion) }}" class="btn btn-warning">Editar</a>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
