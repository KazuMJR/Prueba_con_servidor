<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Escuela</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 5px;
        }

        .card p {
            margin: 10px 0;
        }

        .actions {
            text-align: right;
            margin-top: 20px;
        }

        .actions a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Detalles de la Escuela</h1>

        <div class="card">
            <p><strong>Nombre:</strong> {{ $escuela->nombre_escuela }}</p>
            <p><strong>Dirección:</strong> {{ $escuela->direccion }}</p>
            <p><strong>Código Establecimiento:</strong> {{ $escuela->codigo_establecimiento }}</p>
            <p><strong>Zona:</strong> {{ $escuela->zona }}</p>
        </div>

        <div class="actions">
            <a href="{{ route('escuelas.index') }}">Volver al listado</a>
        </div>
    </div>

</body>
</html>
