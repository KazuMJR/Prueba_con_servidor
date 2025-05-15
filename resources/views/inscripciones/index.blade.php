<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripciones Registradas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/vistasIndex.css') }}">
</head>
<body>

    <div class="container">
        <h1>Inscripciones Registradas</h1>

        <div class="actions">
            <a href="{{ url('/') }}" class="back">Volver al Panel</a>
            <a href="{{ route('inscripciones.create') }}">Agregar Inscripción</a>
        </div>

        @if($inscripciones->isEmpty())
            <div class="alert">
                No hay inscripciones registradas aún.
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->codigo }}</td>
                            <td>{{ $inscripcion->fecha }}</td>
                            <td>
                                <a href="{{ route('inscripciones.show', $inscripcion) }}" class="btn-view">Ver</a>
                                <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn-edit">Editar</a>
                                <form action="{{ route('inscripciones.destroy', $inscripcion) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta inscripción?')">
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
