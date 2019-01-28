@extends('admin.layouts.master')

@section('title', 'Create Category')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('users.index')}}">Users</a>
        </li>
        <li class="breadcrumb-item">Detail</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('users.index')}}" class="btn btn-secondary">Back</a>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning" >Edit</a>
                </div>
            </div>
                <!-- Main content -->
            <div class="invoice p-3 mb-3">

                <div class="row">
                    <div class="col-12">
                        <h5>
                            <strong>User ID: </strong>{{ $user->id}}
                            <small class="float-right">Date created: {{ $user->created_at}}</small>
                        </h5>
                    </div>
                        <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>Display Name</strong><br>{{ $user->displayname }}
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Username</strong><br>
                            {{ $user->username }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong>Email</strong><br>
                        {{ $user->email }}
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        <strong>Role</strong><br>
                        {{ $user->role }}
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Number of posts</strong><br>
                            {{ $user->posts->count() }}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <strong>Status</strong><br>
                        @if($user->status)
                            <span class="status badge badge-success p-10">Show</span>
                        @else
                            <span class="status badge badge-danger p-10">Hide</span>
                        @endif
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.invoice -->
            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category Name</th>
                                <th>Like</th>
                                <th>Time Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->category->categoryname }}
                                </td>
                                <td>
                                    {{ $post->like }}
                                </td>
                                <td>
                                    {{ $post->created_at }}
                                </td>
                                <td>
                                    @if($post->status)
                                        <span class="status badge badge-success p-10">Show</span>
                                    @else
                                        <span class="status badge badge-danger p-10">Hide</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')

@endpush
