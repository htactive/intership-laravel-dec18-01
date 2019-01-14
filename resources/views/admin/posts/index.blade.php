@extends('admin.layouts.master')

@section('title', 'Posts')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">Posts</li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <a href="{{route('posts.create')}}" class="btn btn-success">Thêm Post</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Like</th>
                      <th>Time Created</th>
                      <th>Caterogy</th>
                      <th class="w-10">Status</th>
                      <th class="w-17">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $key => $post)
                        <tr>
                          <td>{{ $post->id }}</td>
                          <td>
                            {{ $post->title }}
                          </td>
                          <td>
                            {{ $post->like }}
                          </td>
                          <td>
                            {{ $post->created_at }}
                          </td>
                          <td>
                          {{ $post->category->categoryname }}
                          </td>
                          <td>
                            @if($post->status)
                                <span class="badge badge-success p5">Hiện</span>
                            @else
                                <span class="badge badge-default p5">Ẩn</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a data-id={{$post->id}} href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            <form id="delete-form-{{$post->id}}" action="{{route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('delete')
                            </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
               </table>
                {{ $posts->links() }}
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
