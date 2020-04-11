@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="h3">
              <i class="fa fa-plus"></i>
              Adicionar Articulo
            </h1>
            <hr>
            {{-- 
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  @foreach($errors->all() as $message)
                    <li> {{ $message }} </li>
                  @endforeach
                </div>
            @endif 
            --}}
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('articles') }}">Lista de Articulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Articulo</li>
              </ol>
            </nav>
            <form action="{{ url('articles') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                            <label for="name" class="text-md-right">Nombre Articulo</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image" class="text-md-right">Foto</label>

                            <button class="btn btn-indigo btn-block btn-upload" type="button"> 
                                <i class="fa fa-upload"></i> 
                                Seleccionar Foto
                            </button>
                            <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror d-none" name="image" accept="image/*">

                            <br>
                            <div class="text-center @error('image') is-invalid @enderror"> 
                              <img src="{{ asset('imgs/nophoto.png') }}" id="preview" class="img-thumbnail" width="120px">
                            </div>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="text-md-right">Descripción Articulo</label>
                            
                            <!-- <textarea class="form-control" id="description" rows="3"></textarea> -->
                            
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user" class="text-md-right">Usuario</label>

                            <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $user->fullname }}" autocomplete="user" autofocus disabled="true">
                        </div>

                        <div class="form-group">
                            <label for="category_id" class="text-md-right">Categoría</label>

                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="">Seleccione...</option>
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}" @if (old('cat', $cat->category_id) == $cat->id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-indigo btn-block">
                                <i class="fa fa-save"></i>
                                Adicionar
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection
