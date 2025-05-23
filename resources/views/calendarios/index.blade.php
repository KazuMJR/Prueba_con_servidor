<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calendario de Exámenes - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Calendario de Exámenes</h1>

    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary me-2">Volver al Panel</a>
        <a href="{{ route('calendarios.create') }}" class="btn btn-primary">Agregar Examen</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($examenes->isEmpty())
        <div class="alert alert-info">No hay exámenes registrados aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th style="width: 220px;">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($examenes as $examen)
                <tr>
                    <td>{{ $examen->id_examen }}</td>
                    <td>{{ \Carbon\Carbon::parse($examen->fecha)->format('d/m/Y') }}</td>
                    <td>{{ $examen->descripcion }}</td>
                    <td class="d-flex flex-wrap gap-1">
                        <a href="{{ route('calendarios.show', $examen->id_examen) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('calendarios.edit', $examen->id_examen) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('calendarios.destroy', $examen->id_examen) }}" method="POST" onsubmit="return confirm('¿Eliminar este examen?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
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
