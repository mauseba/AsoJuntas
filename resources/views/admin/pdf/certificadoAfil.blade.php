<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de afiliacion</title>

    <style type="text/css">
        html {
            margin: 40pt 60pt;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td valign="top"><img src="{{asset('imagenes/LogoCom.png')}}" alt="" width="100"/></td>
            <td align="center">
                <h3 style="text-transform:uppercase;">REPUBLICA DE COLOMBIA <br>DEPARTAMENTO DEL HUILA <br> MUNICIPIO DE ALGECIRAS <br> JUNTA DE ACCIÓN COMUNAL <br>BARRIO {{$datosu['junta']}} <br>RESOLUCION {{$datosu['Resolucion']}} <br>Nit: {{$datosu['Nit']}}   </h3>
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
            que se encuentra en la base de datos identificado con el numero {{$datosu['ID']}}, y con reconocimiento de la gobernación del 
            Huila, bajo código de registro n°0031 a fecha  de 31-01-2017. <br><br>


            Demostrando siempre ser una persona amable, honesta, trabajadora   y cumplidora con los deberes de la comunidad. <br><br>
            Dada en Algeciras-Huila, el día {{$date->format('d')}} del mes {{$date->format('m')}} del {{$date->format('Y')}} a solicitud del  interesado(a).  <br><br> <br>

            Firma En constancia, 
        </p>
    </div><br><br><br>
    <table width="100%">
        <tr>
            <td valign="top">
                <b>_________________________</b>
                <h4><strong>MIRELLA SANDINO</strong></h4>
                <p>C.C 52766132 <br> <strong>Cel.: 3142673007</strong><br><strong>PRESIDENTE</strong></p>
            </td>
            <td align="center">
                <p></p>
            </td>
            <td align="right" valign="top">
                <b>_________________________</b>
                <h4><strong>YASMIN QUIMBAYO</strong></h4>
                <p>C.C.36347833 <br> <strong>Cel.: 3113565174</strong><br><strong>SECRETARIA</strong></p>
            </td>
        </tr>
    </table>

</body>
</html>
</html>