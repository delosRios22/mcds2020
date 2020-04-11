@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('content')
<div align="center">
                                                         
    <div text-align="center">
        <div class="content-select col-sm-4">
            <select name="catid" id="catid" class="form-control">
                <option value="">Seleccione una Categoria</option>
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                @endforeach
            </select>
            <img src="{{ asset('imgs/loading.gif') }}" class="loader mt-5 d-none" height="100px">
            <i></i>
        </div>
    </div><br>


<div class="container" id="content">
    @csrf
        <div class="container-fluid" style="margin-top:20px;">
            <div class="container">
                @foreach ($cats as $cat)
                <div class="card col-sm-8">   
                  <div class="card-body">
                    <img src="{{ asset($cat->image) }}" class="img-thumbnail" width="80px" height="80px">
                    <label class="text-capitalize font-weight-bold" style="font-size: 1.5rem;">{{ $cat->name }}</label>
                  </div>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($artsbycats as $abc)
                            @if ($abc->category_id == $cat->id)
                                <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                                    <div class="card-body"><img src="{{asset($abc->image)}}" style="width: 80px"><div class="desc">{{$abc->description}}</div></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
</div>
@endsection

