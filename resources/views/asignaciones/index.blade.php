<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Asignaciones - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Asignaciones Registradas</h1>

    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary me-2">Volver al Panel</a>
        <a href="{{ route('asignaciones.create') }}" class="btn btn-primary">Agregar Asignación</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($asignaciones->isEmpty())
        <div class="alert alert-info">No hay asignaciones registradas aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Código Inscripción</th>
                <th>Escuela</th>
                <th>Sección</th>
                <th>Grado</th>
                <th>Catedrático</th>
                <th>Curso</th>
                <th style="width: 220px;">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($asignaciones as $asignacion)
                <tr>
                    <td>{{ $asignacion->id_asignacion }}</td>
                    <td>{{ $asignacion->inscripcion->codigo ?? 'N/A' }}</td>
                    <td>{{ $asignacion->escuela->nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->seccion->nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->grado->nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->catedratico->nombre ?? 'N/A' }}</td>
                    <td>{{ $asignacion->curso->nombre ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('asignaciones.show', $asignacion->id_asignacion) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('asignaciones.edit', $asignacion->id_asignacion) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('asignaciones.destroy', $asignacion->id_asignacion) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('¿Estás seguro de eliminar esta asignación?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
