@extends('admin.layouts.master')

@section('title', 'Edit Category')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('categories.index')}}">Categories</a>
        </li>
        <li class="breadcrumb-item">Edit Category</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('categories.index')}}" class="btn btn-secondary">Back</a>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    {!! Form::open(['route' => ['categories.update',$category->id], 'method'=>'PUT']) !!}
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('label1', 'Category Name', ['class' => 'control-label']) !!}
                        {!! Form::text('categoryname', $category->categoryname, ['class' => 'form-control']) !!}
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        {!! Form::label('label2', 'Describe', ['class' => 'control-label']) !!}
                        {!! Form::textarea('describe', $category->describe, ['class' => 'form-control', 'rows' => 3]) !!}
                    </div>
                    <!-- radio -->
                    <div class="form-group">
                    @if($category->status)
                        <div class="form-check">
                            <label class="radio" style="padding-right:15px">
                                {!! Form::radio('status', true, true) !!} Show
                            </label>
                            <label class="radio">
                                {!! Form::radio('status', false) !!} Hide
                            </label>
                        </div>
                    @else
                        <div class="form-check">
                            <label class="radio" style="padding-right:15px">
                                {!! Form::radio('status', true) !!} Show
                            </label>
                            <label class="radio">
                                {!! Form::radio('status', false, true) !!} Hide
                            </label>
                        </div>
                    @endif

                    </div>
                    <div class="col-12">
                        {{ Form::button(
                            '<i class="fa fa-check-circle" style="padding-right:5px" ></i>Update',
                            ['type' => 'submit', 'class' => 'btn btn-success float-left'] )
                        }}
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')

@endpush
