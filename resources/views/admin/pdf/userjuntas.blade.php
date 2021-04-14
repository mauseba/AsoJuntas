<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Informe de usuarios de juntas</title>


    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;
            background-color: lightgray;
            color: black;
            text-align: center;
            line-height: 14px;
            font-size: x-small;
        }
    </style>

    </head>
    <body>

    <table width="100%">
        <tr>
            <td valign="top"><img src="{{asset('imagenes/logo.png')}}" alt="" width="150"/></td>
            <td align="right">
                <h2>INFORME DE AFILIADOS</h2>
                <h3>ASOJUNTAS - Asociacion de juntas de Accion comunal del municipio de Algeciras</h3>
                <pre>
                    Afiliados registrados en la junta: <strong>{{$info[0]->Nombre}}</strong>
                </pre>
            </td>
        </tr>

    </table>

    
    <table width="100%">
        <tr>
            <td><strong>Total de afiliados registrados en la junta de accion comunal: </strong> {{$cuenta}}</td>
        </tr>
    </table>

    <br/>

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>No. documento</th>
                <th>Nombre</th>
                <th>Tipo de doc.</th>
                <th>Genero</th>
                <th>Estrato</th>
                <th>Edad</th>
                <th>Num_contacto</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Junta Asociada</th>
                <th>Comision</th>
                <th>T. Comision</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($info as $inf)
            <tr>
                <th scope="row">{{$inf->Num_identificacion}}</th>
                <td align="center">{{$inf->nombre}}</td>
                <td align="center">{{$inf->Tip_identificacion}}</td>
                <td align="center">{{($inf->Genero)}}</td>
                <td align="center">{{($inf->estrato)}} </td>
                <td align="center">{{($inf->Edad)}}</td>
                <td align="center">{{($inf->Num_contacto)}}</td>
                <td align="center">{{$inf->Correo}}</td>
                <td align="center">{{$inf->Cargo}}</td>
                <td align="center">{{$inf->Nombre}}</td>
                <td align="center">{{$inf->comision}}</td>
                <td align="center">{{$inf->Tipo}}</td>
                
            </tr>
            @endforeach
        </tbody>

    </table>

    <footer>
        <p align="center">
            &copy;2021 Asojunta | All rights reserved
        </p>
        <p align="right"> fecha del informe: {{$date->toDateString()}} a las {{$date->toTimeString()}}</p>
    </footer>

    </body>

</html>