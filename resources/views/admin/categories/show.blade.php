@extends('admin.layouts.master')

@section('title', 'Create Category')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('categories.index')}}">Categoriess</a>
        </li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
</div>
<div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('categories.index')}}" class="btn btn-secondary">Back</a>
                </div>
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    {{ $category->categoryname }}
                    <small class="float-right">Date created: {{ $category->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                <strong>Describe</strong><br>
                  {{ $category->describe }}
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>Number of posts of the category</strong><br>
                    {{ $category->posts->count() }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <strong>Status</strong><br>
                    @if($category->status)
                        <span class="badge badge-success p5">Hiện</span>
                    @else
                        <span class="badge badge-default p5">Ẩn</span>
                    @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Like</th>
                      <th>Time Created</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    @foreach ($posts as $post)
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
                            @if($post->status)
                                <span class="badge badge-success p5">Hiện</span>
                            @else
                                <span class="badge badge-default p5">Ẩn</span>
                            @endif
                          </td>
                    @endforeach
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->



            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')

@endpush
