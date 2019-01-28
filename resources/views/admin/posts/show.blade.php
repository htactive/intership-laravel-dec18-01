@extends('admin.layouts.master')

@section('title', 'Create Category')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('posts.index')}}">Posts</a>
        </li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('posts.index')}}" class="btn btn-secondary">Back</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning" >Edit</a>
                </div>
            </div>
                <!-- Main content -->
            <div class="invoice p-3 mb-3">

                <div class="row">
                    <div class="col-12">
                        <h5>
                            <strong>Post ID: </strong>{{ $post->id }}
                            <small class="float-right">Date created: {{ $post->created_at }}</small>
                        </h5>
                    </div>
                        <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>Title</strong><br>{{ $post->title }}
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Like</strong><br>
                            {{ $post->like }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong>Status</strong><br>
                            @if($post->status)
                                <span class="status badge badge-success p-10">Show</span>
                            @else
                                <span class="status badge badge-danger p-10">Hide</span>
                            @endif
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                    <strong>Category Name</strong><br>
                        {{ $post->category->categoryname }}
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong>Author</strong><br>
                        {{ $post->user->displayname}}
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.invoice -->
            <div class="card">
                <div class="card-body">
                    {!! $post->content !!}
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')

@endpush
