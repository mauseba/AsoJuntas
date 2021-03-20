<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Evento Nuevo</title>
</head>
<body>
    <h3>Hola.</h3>
    <p>Se ha organizado una nueva actividad, con el objetivo de {{$Datos['Asunto']}}.</p> 
    <p>El evento se llevara a cabo el {{$Datos['Fecha']}}, en las horas de: </p>
    <ul>
        <li>Hora de inicio: {{$Datos['hora_inicio']}}</li>
        <li>Hora de final: {{$Datos['hora_final']}}</li>
    </ul>
    <p>Con el objetivo de: </p>
    <p>{{$Datos['descripcion']}}</p>
    <p>Esperamos su participación, con Agradecimiento:</p>
    <h2><strong>ASOJUNTAS</strong></h2>

</body>

</html>
