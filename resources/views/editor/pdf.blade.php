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
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre Articulos</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Categoria</th>

            </tr>
        </thead>
        @foreach ($articles as $arts)
        <tr>
        <td>{{$arts->id}}</td>
        <td>{{$arts->name}}</td>
        <td><img src="{{public_path(). '/'. $arts->image}}" width="40px"></td>
        <td>{{$arts->description}}</td>
        @foreach($cats as $cat)
				@if ($arts->category_id == $cat->id)
					<td> {{ $cat->name }} </td>				
				@endif
		@endforeach	

        </tr>
        @endforeach
    </table>
       
    
</body>
</html>