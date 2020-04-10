<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
</head>
<body>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre Categoria</th>
                <th>Descripción</th>
                <th>Imagen</th>
            </tr>
        </thead>
        @foreach ($cats as $cat)
        <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->description}}</td>
        <td colspan="2" class="text-center">
            <img class="img-thumbnail" src="{{ asset($cats->image) }}" width="200px">
        </td>
        </tr>
        @endforeach
    </table>
       
    
</body>
</html>