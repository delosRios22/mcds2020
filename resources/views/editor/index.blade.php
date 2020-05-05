@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <a href="{{ url('editor/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> 
            Adicionar Articulo
          </a>

          <a href="{{ url('generate/pdf/editor/articles') }}" class="btn btn-dark">
            <i class="fa fa-file-pdf"></i> 
            Generar PDF
          </a>
          <a href="{{ url('generate/excel/editor/articles') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> 
            Generar Excel
          </a>
          <br><br>
          
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre Articulo</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($articles as $article)
                    <tr>
                      <td>{{ $article->name }}</td>
                      <td><img src="{{ asset($article->image) }}" width="40px"></td>
                      <td>{{ $article -> description}}</td>
                      <td>
                        <a href="{{ url('editor/articles/'.$article->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('editor/'.$article->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{url('editor/'.$article->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm btn-delete">
                        <i class="fa fa-trash"></i>
                        </button>
                        </form>
                        <!-- <a href="" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </a> -->
                      </td>
                    </tr>
                @empty
                <tr>
                  <td class="alert alert-danger" colspan="4">
                    No tiene articulos registradas
                  </td>
                </tr>
                @endforelse
                  
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="4">{{ $articles->links() }}</td>
                  </tr>
                </tfoot>
            </table>
            
        </div>     
    </div>
</div>
@endsection
