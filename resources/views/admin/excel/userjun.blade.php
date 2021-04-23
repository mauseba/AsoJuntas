<table>
    <thead>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>Tip_identificacion</th>
        <th>Num_identificacion	</th>
        <th>Direccion</th>
        <th>Genero</th>
        <th>estrato</th>
        <th>Edad</th>
        <th>Num_contacto</th>
        <th>Niv_educacion</th>
        <th>Correo</th>
        <th>Cargo</th>
        <th>junta_id</th>
        <th>comision_id</th>
        <th>Creado el</th>
        <th>Actualizado el</th>
    </tr>
    </thead>
    <tbody>
    @foreach($userjuns as $userjun)
        <tr>
            <td>{{ $userjun->id }}</td>
            <td>{{ $userjun->nombre }}</td>
            <td>{{ $userjun->Tip_identificacion }}</td>
            <td>{{ $userjun->Num_identificacion }}</td>
            <td>{{ $userjun->Direccion }}</td>
            <td>{{ $userjun->Genero }}</td>
            <td>{{ $userjun->estrato }}</td>
            <td>{{ $userjun->Edad }}</td>
            <td>{{ $userjun->Num_contacto }}</td>
            <td>{{ $userjun->Niv_educacion }}</td>
            <td>{{ $userjun->Correo }}</td>
            <td>{{ $userjun->Cargo }}</td>
            <td>{{ $userjun->junta_id }}</td>
            <td>{{ $userjun->comision_id }}</td>
            <td>{{ $userjun->created_at }}</td>
            <td>{{ $userjun->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>