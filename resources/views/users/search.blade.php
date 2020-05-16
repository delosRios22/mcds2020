
@forelse ($users as $user)
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
        @empty
        <tr>
            <td colspan="4" class="bg-indigo text-light">
            No hay Usuarios con ese nombre o correo electrónico!
            </td>
        </tr>
@endforelse
