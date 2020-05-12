@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <a href="{{ url('users/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> 
            Adicionar Usuario
          </a>
          <a href="{{ url('generate/pdf/users') }}" class="btn btn-dark">
            <i class="fa fa-file-pdf"></i> 
            Generar PDF
          </a>
          <a href="{{ url('generate/excel/users') }}" class="btn btn-success">
            <i class="fa fa-file-excel"></i> 
            Generar Excel
          </a>
          <form id='formImportar' action="{{ url('import/excel/users') }}" method="post" enctype="multipart/form-data" style="display: inline-block;">
            @csrf
            <input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
            <button type="button" class="btn btn-success btn-excel">
              <i class="fa fa-file-excel"></i> 
              Importar Usuarios
            </button>
          </form>
          <br><br>
          <div class="form-inline">
          @csrf
          <input type="search" id="qsearch" name="qsearch" class="form-control" autocomplete="off" placeholder="Buscar...">
          </div>
          <br><br>
            <div class="loading d-none text-center">
              <img src="{{ asset('imgs/loading.gif')}}" width="100px">
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nombre Completo</th>
                    <th class="d-none d-sm-table-cell">Correo Electrónico</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="users-content">
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->fullname }}</td>
                      <td class="d-none d-sm-table-cell">{{ $user->email }}</td>
                      <td><img src="{{ asset($user->photo) }}" width="40px"></td>
                      <td>
                        <a href="{{ url('users/'.$user->id) }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-search"></i>
                        </a>
                        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-indigo btn-sm">
                          <i class="fa fa-pen"></i>
                        </a>
                        <form action="{{url('users/'.$user->id)}}" method="post" style="display: inline-block">
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
                    <td colspan="4">{{ $users->links() }}</td>
                  </tr>
                </tfoot>
            </table>
            
        </div>     
    </div>
</div>
@endsection
