<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>


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
                <h2>INFORME DE JUNTAS DE ACCION COMUNAL</h2>
                <h3>ASOJUNTAS - Asociacion de juntas de Accion comunal del municipio de Algeciras</h3>
                <pre>
                   Juntas registradas entre el: {{$input['txtFechaInicial']}}
                   hasta: {{$input['txtFechaFinal']}}
                </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td><strong>Total de juntas de accion comunal registradas:</strong> {{$cuenta}}</td>
        </tr>
    </table>

    <br/>

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>Nit</th>
                <th>Direccion</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Doc. recibo</th>
                <th>Doc. Nit</th>
                <th>Doc. resolucion</th>
                <th>Estado</th>
                <th>Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($info as $inf)
            <tr>
                <th scope="row">{{$inf->Nit}}</th>
                <td align="center">{{$inf->Direccion}}</td>
                <td align="center">{{$inf->Nombre}}</td>
                <td align="center">{{$inf->Correo}}</td>
                <td align="center">@if($inf->D_Recibopago) Si @else No @endif</td>
                <td align="center">@if($inf->D_NIT) Si @else No @endif</td>
                <td align="center">@if($inf->D_Resolucion) Si @else No @endif</td>
                <td align="center">@if($inf->status == '1') Activa @else Inactiva @endif</td>
                <td align="center">{{$inf->Observaciones}}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

    <footer>
        <p align="center">
            &copy;2021 Asojunta | All rights reserved
        </p>
        <p align="right"> fecha del informe: {{$date->toDateString()}} a las {{$date->toTimeString()}}  </p>
    </footer>

    </body>

</html>