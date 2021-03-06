<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento Nuevo</title>
</head>
<body>
    <div class="card">
        <div class="card-body">

            <p>Asunto: {{$Datos['Asunto']}}<p>
            <p>Fecha: {{$Datos['Fecha']}}<p>
            <p>Hora de inicio: {{$Datos['hora_inicio']}}<p>
            <p>Hora de final: {{$Datos['hora_final']}}<p>
            <p>Descripcion del evento: {{$Datos['descripcion']}}<p>

        </div>
    </div>
    
</body>
</html>