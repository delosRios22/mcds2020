@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="h3">
              <i class="fa fa-search"></i>
              Consultar Articulo
            </h1>
            <hr>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('myarticles') }}">Mis Articulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Articulo</li>
              </ol>
            </nav>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                        <img class="img-thumbnail" src="{{ asset($article->image) }}" width="200px">
                    </td>
                </tr>
                <tr>
                    <th>Nombre Articulo:</th>
                    <td>{{ $article->name }}</td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td>{{ $article->description }}</td>
                </tr>    

            </table>
            
        </div>
    </div>
</div>
@endsection
