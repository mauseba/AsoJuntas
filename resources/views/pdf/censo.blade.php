<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Censo PDF</title>


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
        }
    </style>

    </head>
    <body>

    <table width="100%">
        <tr>
            <td valign="top"><img src="{{asset('imagenes/logo.png')}}" alt="" width="150"/></td>
            <td align="right">
                <h2>INFORME CENSO COMUNAL </h2>
                <h4>Generado por: {{ Auth::user()->name }} </h2>                
                <h3>Asociación de juntas de Accion comunal del municipio de Algeciras</h3>
                <pre>
                  {{--  Juntas registradas entre el: {{$input['txtFechaInicial']}}
                   hasta: {{$input['txtFechaFinal']}} --}}
                </pre>
            </td>
        </tr>

    </table>
    <br/>
    <table width="100%">
        <tr>
            <td><h2>DATOS BÁSICOS</h2></td>
        </tr>
    </table>
    
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th >#</th>
                <th >Junta</th>
                <th >Afiliado</th>
                <th >Barrio</th>
                <th >Direccion</td>
                <th >Tipo Vivienda</td>
                <th >Energia</td>
                <th >Gas</td>
                <th >Agua</td>
                <th >Alcantarilla</td>
                <th >Escrituras</td> 
                <th >Sisben</td> 
                <th >Sub Vivienda</td> 
                <th >Sub Gobierno</td> 
                <th >Piso</td> 
                <th >Techo</td> 
                <th >Pañete</td> 
                <th >Baños</td> 
                <th >Baño Nuevo</td> 
                <th >Vivienda Nueva</td>                                             
                <th >Actualizado</td>               
            </tr>
        </thead>
        <tbody>
            @foreach ($censo as $censos)
            <tr>
                
                <td align="center">{{$loop->iteration}}</td>
                <td align="center">{{$censos->Nombre}}</td>
                <td align="center">{{$censos->nombre}}</td>
                <td align="center">{{$censos->barrio}}</td>
                <td align="center">{{$censos->direccion}}</td>
                <td align="center">{{$censos->tipo_vivienda}}</td>
                <td align="center">{{$censos->energia}}</td>
                <td align="center">{{$censos->gas}}</td>
                <td align="center">{{$censos->agua}}</td>
                <td align="center">{{$censos->alcantarilla}}</td>
                <td align="center">{{$censos->escrituras}}</td>
                <td align="center">{{$censos->sisben}}</td>
                <td align="center">{{$censos->sub_vivienda}}</td>
                <td align="center">{{$censos->sub_gobierno}}</td>
                <td align="center">{{$censos->piso}}</td>
                <td align="center">{{$censos->techo}}</td>
                <td align="center">{{$censos->pañete}}</td>
                <td align="center">{{$censos->baños}}</td>
                <td align="center">{{$censos->baño_nuevo}}</td>
                <td align="center">{{$censos->vivienda_nueva}}</td>                   
                <td align="center">{{$censos->updated_at->format('Y-m-d')}}</td> 
            </tr>
            
            @endforeach
        </tbody>

    </table>
    <table width="100%">
        <tr>
            <td><h2>BENEFICIARIOS</h2></td>
        </tr>
    </table>
    <table width="100%">
        
        <thead style="background-color: lightgray;">
            <tr>
               
                <th >#</th>
                <th >Nombre</th>
                <th >Tipo_Doc</th>
                <th >Numero</th>
                <th >Edad</th>
                <th >Genero</th>
                <th >Tipo afiliacion Salud</th>
                <th >EPS</th>
                <th >Discapacidad</th>
                <th >Nivel Educativo</th>
                <th >Sub Gobierno</th>
                <th >Afiliado</th>
                <th >Junta</th>
                <th >Actualizado</th>
                
             
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiarios as $beneficiario)                
            <tr>
                                                  
                            <td align="center">{{$loop->iteration}}</td>
                            <td align="center">{{$beneficiario->name}}</td>
                            <td align="center">{{$beneficiario->tipo_doc}}</td>
                            <td align="center">{{$beneficiario->numero}}</td>
                            <td align="center">{{$beneficiario->edad}}</td>
                            <td align="center">{{$beneficiario->genero}}</td>
                            <td align="center">{{$beneficiario->tipo_salud}}</td>
                            <td align="center">{{$beneficiario->salud}}</td>
                            <td align="center">{{$beneficiario->discap}}</td>
                            <td align="center">{{$beneficiario->nivel_edu}}</td>
                            <td align="center">{{$beneficiario->sub_gobierno}}</td>
                            <td align="center">{{$beneficiario->nombre}}</td>
                            <td align="center">{{$beneficiario->Nombre}}</td>
                            <td align="center">{{$beneficiario->updated_at->format('Y-m-d')}}</td>
                        </tr>
            @endforeach
        </tbody>

    </table>
    <br/>
    


    <footer>
        <p>
            &copy;2021 Asojunta | All rights reserved
        </p>
    </footer>

    </body>

</html>