@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <a href="{{ url('articles/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> 
            Adicionar Articulo
          </a>

          <a href="{{ url('generate/pdf/articles') }}" class="btn btn-dark">
            <i class="fa fa-file-pdf"></i> 
            Generar PDF
          </a>
          <a href="{{ url('generate/excel/articles') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> 
            Generar Excel
          </a>
          <br><br>
          <div class="form-inline">
          @csrf
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
              </div>
              <input type="search" id="qsearch" name="qsearch" class="form-control" placeholder="Buscar..." autocomplete="off">
            </div>
          </div>
          <br><br>
          <div class="loading d-none text-center">
              <img src="{{ asset('imgs/loading.gif')}}" width="100px">
            </div>
          
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre Articulo</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="articles-content">
                  @foreach ($articles as $article)
                    <tr>
                      <td>{{ $article->name }}</td>
                      <td><img src="{{ asset($article->image) }}" width="40px"></td>
                      <td>{{ $article -> description}}</td>
                      <td>
                        <a href="{{ url('articles/'.$article->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{url('articles/'.$article->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-delete">
                        <i class="fa fa-trash"></i>
                        </button>
                        </form>
                        <!-- <a href="" class="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </a> -->
                      </td>
                    </tr>
                  @endforeach
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
