@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4"> 
        <div class="card"> 
          <img src="{{ asset('imgs/misdatos.png') }}" class="card-img-top" height="240px"> 
          <div class="card-body"> 
            <a href="{{ url('mydata') }}" class="btn btn-indigo btn-block">Mis Datos</a>
          </div> 
      </div> 
     </div> 
     <div class="col-md-4"> 
        <div class="card"> 
          <img src="{{ asset('imgs/misarticulos.png') }}" class="card-img-top" height="240px">
          <div class="card-body"> 
            <a href="{{ url('myarticles') }}" class="btn btn-indigo btn-block">Mis Articulos</a>
          </div> 
        </div>
      </div>
  </div>
@endsection
