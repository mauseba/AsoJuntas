<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de sana tenencia</title>

    <style type="text/css">
        html {
            margin: 40pt 60pt;
        }
        .imagen img{
            width: 100%; 
            max-width: 120px; 
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
                    <img src="{{asset('imagenes/LogoCom.png')}}" alt="" width="90"/>
                @endisset
            </td>
            <td align="center">
                <h3 style="text-transform:uppercase;">REPUBLICA DE COLOMBIA <br>DEPARTAMENTO DEL HUILA <br> MUNICIPIO DE ALGECIRAS <br> JUNTA DE ACCIÓN COMUNAL <br>{{$datosu['junta']}} <br>RESOLUCION {{$datosu['Resolucion']}} <br>Nit: {{$datosu['Nit']}}   </h3>
            </td>
            <td align="right" valign="top"><img src="{{asset('imagenes/colombia.png')}}" alt="" width="120"/></td>
        </tr>
    </table>

    <hr style="height:2px;" color="black"><br><br>

    

    <div>
        <h2 align='center'>
            La Junta De Acción Comunal 
        </h2>
        <h3 align='center'>
            Certifica Que: 
        </h3><br>

        <p style="text-align:justify; font-size: 13pt;">
            Yo <strong  style="text-transform:uppercase;" >{{$presi['nombre']}}</strong> identificado(a) con {{$presi['Tip_identificacion']}} N° {{$presi['Num_identificacion']}}, en mi calidad de presidente de la junta de acción 
            comunal con reconocimiento legal expedido por la gobernación del Huila, certifico que el señor (ra) <strong  style="text-transform:uppercase;" >{{$datosu['nombre']}}</strong>  ,identificada (o) 
            con la {{$datosu['Tdocumento']}} N° {{$datosu['Documento']}} expedida en {{$datosu['Expedido']}}, ha ejercido por un periodo mayor a cinco años la sana tenencia quieta libre y pacifica 
            sobre el inmueble ubicado en la vereda {{$datosu['junta']}} , localizada en  {{$datosu['Direccion']}} del municipio de Algeciras  departamento del Huila, 
            librando a la junta de acción comunal de responsabilidades ante cualquier proceso que tenga por objeto recuperar la posesión del bien.<br><br>

            Demostrando siempre ser una persona amable, honesta, trabajadora   y cumplidora con los deberes de la comunidad. <br><br>
            Dada en Algeciras-Huila, el día {{\Carbon\Carbon::now()->format('d')}} del mes {{\Carbon\Carbon::now()->locale('es')->isoFormat('MMMM')}} del {{\Carbon\Carbon::now()->format('Y')}}, a solicitud del  interesado.  <br><br> <br>

            Firma En constancia, 
        </p>
    </div><br><br>
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