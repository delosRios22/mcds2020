@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <a href="{{ url('categories/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> 
            Adicionar Categoria
          </a>

          <a href="{{ url('generate/pdf/categories') }}" class="btn btn-dark">
            <i class="fa fa-file-pdf"></i> 
            Generar PDF
          </a>
          <br><br>
          
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre Categoria</th>
                    <th>Foto</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cats as $cat)
                    <tr>
                      <td>{{ $cat->name }}</td>
                      <td><img src="{{ asset($cat->image) }}" width="40px"></td>
                      <td>{{ $cat-> description }}
                      <td>
                        <a href="{{ url('categories/'.$cat->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('categories/'.$cat->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{url('categories/'.$cat->id)}}" method="post" style="display: inline-block">
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
                    <!-- <td colspan="4">{{ $cats->links() }}</td> -->
                  </tr>
                </tfoot>
            </table>
            
        </div>     
    </div>
</div>
@endsection
