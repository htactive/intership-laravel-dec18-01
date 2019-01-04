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
            <a href="{{route('categories.create')}}" class="btn btn-success">Thêm Slider</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category Name</th>
                      <th>Describe</th>
                      <th class="w-10">Status</th>
                      <th class="w-17">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                          <td>{{ $key + 1 }}</td>
                          <td>
                            {{ $category->categoryname }}
                          </td>
                          <td>
                            {{ $category->describe }}
                          </td>
                          <td>
                            @if($category->status)
                                <span class="badge badge-success p5">Hiện</span>
                            @else
                                <span class="badge badge-default p5">Ẩn</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('categories.show', $category->id)}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-id={{$category->id}} href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{$category->id}}" action="{{route('categories.destroy', $category->id)}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
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
<link rel="stylesheet" href="{{asset('backend/plugins/datatables/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')

@endpush
