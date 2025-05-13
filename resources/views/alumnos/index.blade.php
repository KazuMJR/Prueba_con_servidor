<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/vistasIndex.css') }}">
</head>
<body>

    <div class="container">
        <h1>Alumnos Registrados</h1>

        <div class="actions">
            <a href="{{ url('/') }}" class="back">Volver al Panel</a>
            <a href="{{ route('alumnos.create') }}">Agregar Alumno</a>
        </div>

        @if($alumnos->isEmpty())
            <div class="alert">
                No hay alumnos registrados aún.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>CUI</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Inscripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->cui }}</td>
                            <td>{{ $alumno->nombre_alumno }}</td>
                            <td>{{ $alumno->edad }}</td>
                            <td>{{ $alumno->sexo }}</td>
                            <td>{{ $alumno->inscripcion_codigo }}</td>
                            <td>
                                <a href="{{ route('alumnos.show', $alumno) }}" class="btn-view">Ver</a>
                                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este alumno?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
