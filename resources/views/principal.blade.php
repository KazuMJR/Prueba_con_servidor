<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Principal - MINEDUC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('styles/principal.css') }}">
    
</head>
<body>

    <div class="container">
        <h1>Panel Principal - MINEDUC</h1>
        <div class="row">
            @foreach([ 'escuelas', 'alumnos', 'catedraticos', 'grados', 'secciones', 'cursos', 'programas', 'inscripciones', 'tutelares', 'horarios', 'calendarios', 'asignaciones', 'actividades' ] as $entidad)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ str_replace('_', ' ', ucfirst($entidad)) }}</h5>
                        <a href="{{ route($entidad . '.index') }}" class="btn-primary">Ver</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
