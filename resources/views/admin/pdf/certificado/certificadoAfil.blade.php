<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de afiliacion</title>

    <style>
        html {
            margin: 40pt 60pt;
        }

        .imagen img{
            width: 100%; 
            max-width: 130px; 
            height: auto;
        }

    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td valign="top">
                @isset ($junta->image)
                    <div class="imagen">
                        <img src="{{asset(Storage::url($junta->image->url))}}">
                    </div>
                @else
                    <img src="{{asset('imagenes/LogoCom.png')}}" alt="" width="100"/>
                @endisset
            </td>
            <td align="center">
                <h3 style="text-transform:uppercase;">REPUBLICA DE COLOMBIA <br>DEPARTAMENTO DEL HUILA <br> MUNICIPIO DE ALGECIRAS <br> JUNTA DE ACCIÓN COMUNAL <br>{{$datosu['junta']}} <br>RESOLUCION {{$datosu['Resolucion']}} <br>Nit: {{$datosu['Nit']}}   </h3>
            </td>
            <td align="right" valign="top"><img src="{{asset('imagenes/colombia.png')}}" alt="" width="120"/></td>
        </tr>
    </table>

    <hr style="height:2px;" color="black"><br><br><br>

    

    <div>
        <h2 align='center'>
            La Junta De Acción Comunal 
        </h2>
        <h3 align='center'>
            Certifica Que: 
        </h4><br>
        <p style="text-align:justify; font-size: 13pt;">
            El (la) señor(a) <strong  style="text-transform:uppercase;" >{{$datosu['nombre']}}</strong>  identificado(a) con {{$datosu['Tdocumento']}}  N° {{$datosu['Documento']}} expedida en {{$datosu['Expedido']}}, verificado
            que se encuentra en la base de datos identificado con el numero {{$datosu['id']}}, y con reconocimiento de la gobernación del 
            Huila, bajo código de registro n°0031 a fecha  de 31-01-2017. <br><br>


            Demostrando siempre ser una persona amable, honesta, trabajadora   y cumplidora con los deberes de la comunidad. <br><br>
            Dada en Algeciras-Huila, el día {{\Carbon\Carbon::now()->format('d')}} del mes {{\Carbon\Carbon::now()->locale('es')->isoFormat('MMMM')}} del {{\Carbon\Carbon::now()->format('Y')}}, a solicitud del  interesado.  <br><br> <br>

            Firma En constancia, 
        </p>
    </div><br><br><br>
    <table width="100%">
        <tr>
            <td valign="top">
                <b>_________________________</b>
                <p><strong style="text-transform:uppercase;" >{{$presi->nombre}}</strong> <br>{{$presi->Tip_identificacion}} No. {{$presi->Num_identificacion}} <br> tel: {{$presi->Num_contacto}}<br><strong style="text-transform:uppercase;">{{$presi->Cargo}}</strong></p>
            </td>
            <td align="center">
                <p></p>
            </td>
            <td align="right" valign="top">
                <b>_________________________</b>
                <p><strong style="text-transform:uppercase;" >{{$secr->nombre}}</strong><br>{{$secr->Tip_identificacion}} {{$secr->Num_identificacion}}<br> tel: {{$secr->Num_contacto}}<br><strong style="text-transform:uppercase;">{{$secr->Cargo}}</strong></p>
            </td>
        </tr>
    </table>

</body>
</html>
</html>