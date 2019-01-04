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
              <h3 class="card-title">Data Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Describe</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $key => $categories)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>
                                {{$categories->categoryname}}
                            </td>
                            <td>
                                {{$categories->describe}}
                            </td>
                            <td>
                                @if($categories->status)
                                    <span class="badge badge-success p5">Hiện</span>
                                @else
                                    <span class="badge badge-default p5">Ẩn</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('categories.show', $categories->id)}}" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{route('categories.edit', $categories->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a data-id={{$categories->id}} href="{{route('categories.destroy', $categories->id)}}" class="btn btn-danger delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form id="delete-form-{{$categories->id}}" action="{{route('categories.destroy', $categories->id)}}" method="post">
                                    @csrf
                                    @method('delete')

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
@endsection
