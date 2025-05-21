<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tutelares - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css (opcional para animaciones suaves) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

<div class="container py-4">
    <h1 class="mb-4 animate__animated animate__fadeInDown">Tutelares Registrados</h1>

    <div class="mb-3 d-flex gap-2">
        <a href="{{ url('/') }}" class="btn btn-secondary">Volver al Panel</a>
        <a href="{{ route('tutelares.create') }}" class="btn btn-primary">Agregar Tutor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success animate__animated animate__fadeInDown">{{ session('success') }}</div>
    @endif

    @if($tutelares->isEmpty())
        <div class="alert alert-info animate__animated animate__fadeIn">No hay tutelares registrados aún.</div>
    @else
        <div class="table-responsive animate__animated animate__fadeIn">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                <tr>
                    <th>CUI Alumno</th>
                    <th>Alumno</th>
                    <th>CUI Tutor</th>
                    <th>Nombre Tutor</th>
                    <th>Teléfono</th>
                    <th class="text-center" style="width: 220px;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tutelares as $tutelar)
                    <tr>
                        <td>{{ $tutelar->cui_alumno }}</td>
                        <td>{{ $tutelar->alumno->nombre_alumno ?? 'N/A' }}</td>
                        <td>{{ $tutelar->cui_tutor }}</td>
                        <td>{{ $tutelar->nombre_tutor }}</td>
                        <td>{{ $tutelar->telefono }}</td>
                        <td class="text-center">
                            <a href="{{ route('tutelares.show', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" class="btn btn-sm btn-info me-1">Ver</a>
                            <a href="{{ route('tutelares.edit', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" class="btn btn-sm btn-warning me-1">Editar</a>
                            <form action="{{ route('tutelares.destroy', [$tutelar->cui_alumno, $tutelar->cui_tutor]) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este tutor?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
