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
            <div class="card-header">
            <a href="{{route('categories.create')}}" class="btn btn-success">Thêm User</a>
            </div>
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
                                <span class="badge badge-success p5">Open</span>
                            @else
                                <span class="badge badge-default p5">Block</span>
                            @endif
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
@endpush

@push('scripts')

@endpush
