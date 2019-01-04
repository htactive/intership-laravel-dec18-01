@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">Dashboard</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-6 col-lg-3">
    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
        <div class="info">
        <h4>Users</h4>
        <p><b>5</b></p>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
        <div class="info">
        <h4>Likes</h4>
        <p><b>25</b></p>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
        <div class="info">
        <h4>Uploades</h4>
        <p><b>10</b></p>
        </div>
    </div>
    </div>
    <div class="col-md-6 col-lg-3">
    <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
        <div class="info">
        <h4>Stars</h4>
        <p><b>500</b></p>
        </div>
    </div>
    </div>
</div>
@endsection

@push('styles')

@endpush

@push('scripts')

@endpush
