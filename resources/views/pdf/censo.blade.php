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
                <h2>INFORME CENSO INDIVIDUAL </h2>
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
   {{--  <table width="100%">
        <tr>
            <td><h2>CENSO COMUNAL INDIVIDUAL</h2></td>
        </tr>
    </table> --}}
    
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th >#</th>
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
                <th  >Sub Vivienda</td> 
                <th  >Sub Gobierno</td> 
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
                
                <td>{{$loop->iteration}}</td>
                <td>{{$censos->user['name']}}</td>
                <td>{{$censos->barrio}}</td>
                <td>{{$censos->direccion}}</td>
                <td>{{$censos->tipo_vivienda}}</td>
                <td>{{$censos->energia}}</td>
                <td>{{$censos->gas}}</td>
                <td>{{$censos->agua}}</td>
                <td>{{$censos->alcantarilla}}</td>
                <td>{{$censos->escrituras}}</td>
                <td>{{$censos->sisben}}</td>
                <td>{{$censos->sub_vivienda}}</td>
                <td>{{$censos->sub_gobierno}}</td>
                <td>{{$censos->piso}}</td>
                <td>{{$censos->techo}}</td>
                <td>{{$censos->pañete}}</td>
                <td>{{$censos->baños}}</td>
                <td>{{$censos->baño_nuevo}}</td>
                <td>{{$censos->vivienda_nueva}}</td>                   
                 <td>{{$censos->updated_at->format('Y-m-d')}}</td> 
            </tr>
            
            @endforeach
        </tbody>

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
                
             
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiarios as $beneficiario)                
            <tr>
                                                  
                            <td>{{$loop->iteration}}</td>
                            <td>{{$beneficiario->name}}</td>
                            <td>{{$beneficiario->tipo_doc}}</td>
                            <td>{{$beneficiario->numero}}</td>
                            <td>{{$beneficiario->edad}}</td>
                            <td>{{$beneficiario->genero}}</td>
                            <td>{{$beneficiario->tipo_salud}}</td>
                            <td>{{$beneficiario->salud}}</td>
                            <td>{{$beneficiario->discap}}</td>
                            <td>{{$beneficiario->nivel_edu}}</td>
                            <td>{{$beneficiario->sub_gobierno}}</td>
                            <td>{{$beneficiario->user['name']}}</td>
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