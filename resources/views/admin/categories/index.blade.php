@extends('admin.layouts.master')

@section('title', 'Categories')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">Caterogies</li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a href="{{route('categories.create')}}" class="btn btn-success">Add Category</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Describe</th>
                      <th>Number of Post</th>
                      <th class="w-10">Status</th>
                      <th class="w-17">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                          <td>{{ $category->id }}</td>
                          <td>
                            {{ $category->categoryname }}
                          </td>
                          <td>
                            {{ $category->describe }}
                          </td>
                          <td>
                            {{ $category->posts->count() }}
                          </td>
                          <td>
                            @if($category->status)
                                <span class="badge badge-success p5">Hiện</span>
                            @else
                                <span class="badge badge-default p5">Ẩn</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('categories.show', $category->slug)}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-id={{$category->id}} href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            {!!Form::open([
                                        'route' => ['categories.destroy', $category->id],
                                        'id' => 'delete-form-' . $category->id,
                                        'method' => 'DELETE'
                                    ])
                            !!}{!! Form::close() !!}
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
               </table>
                {{ $categories->links() }}
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
