@if(isset($cat))

        <div class="card">   
        <div class="card-body">
            <img src="{{ asset($cat->image) }}" class="img-thumbnail" width="80px" height="80px">
            <label class="text-capitalize font-weight-bold" style="font-size: 1.5rem;">{{ $cat->name }}</label>
        </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($artsbycats as $abc)
                    @if ($abc->category_id == $cat->id)
                        <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                            <div class="Portfolio"><img src="{{asset($abc->image)}}"><div class="desc">{{$abc->description}}</div></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div> 
@endif
 @if(isset($cats))

@else 
    @foreach ($cats as $cat)
        <div class="card">   
        <div class="card-body">
            <img src="{{ asset($cat->image) }}" class="img-thumbnail" width="80px" height="80px">
            <label class="text-capitalize font-weight-bold" style="font-size: 1.5rem;">{{ $cat->name }}</label>
        </div>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($artsbycats as $abc)
                    @if ($abc->category_id == $cat->id)
                        <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                            <div class="Portfolio"><img src="{{asset($abc->image)}}"><div class="desc">{{$abc->description}}</div></div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div> 
    @endforeach     

@endif       
