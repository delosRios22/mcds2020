<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
		body {
			font-family: Helvetica;
		}
		table {
			border-collapse: collapse;
		}
		table th,
		table td {
			font-size: 14px !important;
		}
		table th {
			background-color: gray;
			color: white;
			text-align: center;
		}
		table td {
			border: 1px solid silver;
			padding: 10px;
		}
	</style>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Birthdate</th>
                <th>Genero</th>
                <th>Dirección</th>

            </tr>
        </thead>
        @foreach ($users as $user)
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->birthdate}}</td>
        <td>{{$user->gender}}</td>
        <td>{{$user->address}}</td>
        </tr>
        @endforeach
    </table>
       
    
</body>
</html>