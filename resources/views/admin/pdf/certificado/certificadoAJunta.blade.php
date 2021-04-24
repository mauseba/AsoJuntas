<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de residencia</title>

    <style type="text/css">
        html {
            margin: 40pt 60pt;
        }

    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td valign="top"><img src="{{asset('imagenes/logo.png')}}" alt="" width="140"/></td>
            <td align="center">
                <h3 style="text-transform:uppercase;">REPUBLICA DE COLOMBIA <br>DEPARTAMENTO DEL HUILA <br> MUNICIPIO DE ALGECIRAS <br>ASOJUNTAS <br>RESOLUCION 0445 <br>Nit: 901350253-6</h3>            </td>
            <td align="right" valign="top"><img src="{{asset('imagenes/colombia.png')}}" alt="" width="110"/></td>
        </tr>
    </table>

    <hr style="height:2px;" color="black"><br><br><br>

    

    <div>
        <h2 align='center'>
            La Asociacion De Juntas De Acción Comunal 
        </h2>
        <h3 align='center'>
            Certifica Que: 
        </h4><br>
        <p style="text-align:justify; font-size: 13pt;">
            La junta <strong  style="text-transform:uppercase;" >{{$junta->Nombre}}</strong>  identificada con  NIT  N° {{$junta->Nit}} y con resolucion N° {{$junta->Resolucion}}, verificado
            que se encuentra en la base de datos identificado con el numero {{$junta->id}}, con reconocimiento desde gobernación
            del Huila, bajo código de registro n°0031 a fecha de 31-01-2017. <br><br>

            Dada en Algeciras-Huila, el día {{\Carbon\Carbon::now()->format('d')}} del mes {{\Carbon\Carbon::now()->locale('es')->isoFormat('MMMM')}} del {{\Carbon\Carbon::now()->format('Y')}}, a solicitud del  interesado.  <br><br> <br>

            Firma En constancia, 
        </p>
    </div><br><br><br> <br>
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