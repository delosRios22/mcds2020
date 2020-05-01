@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="h3">
              <i class="fa fa-pen"></i>
              Modificar Articulo
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
                <li class="breadcrumb-item"><a href="{{ url('myarticles') }}">Mis Articulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modificar Articulo</li>
              </ol>
            </nav>
            <form action="{{ url('articles/'.$article->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input type="hidden" name="id" value="{{ $article->id }}">
              <div class="form-group">
                            <label for="name" class="text-md-right">Nombre Articulo</label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $article->name) }}" autocomplete="name" autofocus>

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
                              <img src="{{ asset($article->image) }}" id="preview" class="img-thumbnail" width="120px">
                            </div>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category" class="text-md-right">Categoría</label>

                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                                <option value="">Seleccione...</option>
                                @foreach ($cats as $cat)
                                    <option value="{{ $cat->id }}" @if (old('cat', $article->category_id) == $cat->id) selected @endif>{{ $cat->name }}</option>
                                @endforeach
                            </select>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="text-md-right">Desccripción</label>

                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $article->description) }}" autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                     

                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-indigo btn-block">
                                <i class="fa fa-save"></i>
                                Modificar
                            </button>
                        </div>
            </form>
        </div>
    </div>
</div>
@endsection
