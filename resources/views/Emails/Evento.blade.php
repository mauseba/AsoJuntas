@component('mail::message')
# INVITACION A EVENTO 
<br>
<p>La asociación de juntas de accion comunal del municipio de Algeciras - ASOJUNTAS lo complace invitar, a: </p>

<h2 align="center"><strong >{{$txtDatos['Asunto']}}</strong></h2>
    
<p>Con el objectivo de:</p>
<div>
    {!!$txtDatos['descripcion']!!}
</div>
<p>
    Que se llevara acabo el dia <strong>{{\Carbon\Carbon::parse($txtDatos['Fecha'])->format('d')}}</strong> de <strong>{{\Carbon\Carbon::parse($txtDatos['Fecha'])->locale('es')->isoFormat('MMMM')}}</strong> del <strong>{{\Carbon\Carbon::parse($txtDatos['Fecha'])->format('Y')}}</strong>,
    a las {{\Carbon\Carbon::parse($txtDatos['hora_inicio'])->isoFormat('h:mm:ss a')}}
</p>

Saludos, <br>
<strong>{{config('app.name')}}</strong>
    
@endcomponent