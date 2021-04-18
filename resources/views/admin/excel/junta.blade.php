<table>
    <thead>
    <tr>
        <th>id</th>
        <th>FechaC</th>
        <th>Nit</th>
        <th>Direccion</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Resolucion</th>
        <th>D_Recibopago</th>
        <th>D_NIT</th>
        <th>D_Resolucion</th>
        <th>status</th>
        <th>Observaciones</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($juntas as $junta)
        <tr>
            <td>{{ $junta->id }}</td>
            <td>{{ $junta->FechaC }}</td>
            <td>{{ $junta->Nit }}</td>
            <td>{{ $junta->Direccion }}</td>
            <td>{{ $junta->Nombre }}</td>
            <td>{{ $junta->Correo }}</td>
            <td>{{ $junta->Resolucion }}</td>
            <td>{{ $junta->D_Recibopago }}</td>
            <td>{{ $junta->D_NIT }}</td>
            <td>{{ $junta->D_Resolucion }}</td>
            <td>{{ $junta->status }}</td>
            <td>{{ $junta->Observaciones }}</td>
            <td>{{ $junta->created_at }}</td>
            <td>{{ $junta->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>