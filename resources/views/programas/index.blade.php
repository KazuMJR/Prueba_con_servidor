<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas Registrados - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/vistasIndex.css') }}">
</head>
<body>
<div class="container">
    <h1>Programas Registrados</h1>

    <div class="actions">
        <a href="{{ url('/') }}" class="back">Volver al Panel</a>
        <a href="{{ route('programas.create') }}">Agregar Programa</a>
    </div>

    @if($programas->isEmpty())
        <div class="alert">No hay programas registrados aún.</div>
    @else
        <table>
            <thead>
                <tr>
                    <th>Grado</th>
                    <th>Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($programas as $programa)
                    <tr>
                        <td>{{ $programa->grado->nombre_grado }}</td>
                        <td>{{ $programa->curso->nombre_curso }}</td>
                        <td>
                            <a href="{{ route('programas.show', $programa) }}" class="btn-view">Ver</a>
                            <a href="{{ route('programas.edit', $programa) }}" class="btn-edit">Editar</a>
                            <form action="{{ route('programas.destroy', $programa) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este programa?')">
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
