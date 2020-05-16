@forelse ($articles as $article)
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
        @empty
        <tr>
            <td colspan="4" class="bg-indigo text-light">
                No hay articulos registrados con ese nombre
            </td>
        </tr>
@endforelse
