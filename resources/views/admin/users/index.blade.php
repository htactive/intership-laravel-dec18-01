@extends('admin.layouts.master')

@section('title', 'Users')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">Users</li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Display Name</th>
                      <th>Number of Posts</th>
                      <th>Role</th>
                      <th class="w-10">Status</th>
                      <th class="w-17">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>
                            {{ $user->username }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->displayname }}
                          </td>
                          <td>
                            {{ $user->posts->count() }}
                          </td>
                          <td>
                          {{ $user->role }}
                          </td>
                          <td>
                            @if($user->status)
                                <a href="{{route('users.status', $user->id)}}" data-id="{{$user->id}}" class="status badge badge-success p-10">Show</a>
                            @else
                                <a href="{{route('users.status', $user->id)}}" data-id="{{$user->id}}" class="status badge badge-danger p-10">Hide</a>
                            @endif

                            {!!Form::open([
                                        'route' => ['users.status', $user->id],
                                        'id' => 'status-form-' . $user->id
                                    ])
                            !!}
                            {!! Form::close() !!}
                          </td>
                          <td>
                            <a href="{{route('users.show', $user->id)}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('users.edit', $user->id)}}" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-id={{$user->id}} href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{$user->id}}" action="{{route('users.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
               </table>
                {{ $users->links() }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
   @if(Session::has('message'))
		var type="{{Session::get('alert-type','info')}}"
		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Bạn có chắc muốn xóa?",
            text: "Sau khi xóa, bạn sẽ không khôi phục lại được!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#delete-form-' + id).submit();
            } else {
                swal("Dữ liệu an toàn!");
            }
        });
    });

    $(document).on('click', '.status', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        swal({
            title: "Bạn có chắc muốn thay đổi trạng thái?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $('#status-form-' + id).submit();
            } else {
                swal("Dữ liệu an toàn!");
            }
        });
    });
</script>
@endpush
