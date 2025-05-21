<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripciones - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4">Inscripciones Registradas</h1>

    <div class="mb-3">
        <a href="{{ url('/') }}" class="btn btn-secondary me-2">Volver al Panel</a>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-primary">Agregar Inscripción</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($inscripciones->isEmpty())
        <div class="alert alert-info">No hay inscripciones registradas aún.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
            <tr>
                <th>Código</th>
                <th>Fecha</th>
                <th style="width: 180px;">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->codigo }}</td>
                    <td>{{ \Carbon\Carbon::parse($inscripcion->fecha)->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('inscripciones.show', $inscripcion->codigo) }}" class="btn btn-sm btn-info me-1">Ver</a>
                        <a href="{{ route('inscripciones.edit', $inscripcion->codigo) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                        <form action="{{ route('inscripciones.destroy', $inscripcion->codigo) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta inscripción?')">
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

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
