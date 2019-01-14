@extends('admin.layouts.master')

@section('title', 'Create Category')

@section('content')
<div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('dashboard')}}"><i class="fa fa-home fa-lg"></i></a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{route('categories.index')}}">Categories</a>
        </li>
        <li class="breadcrumb-item">Create Category</li>
    </ul>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('posts.index')}}" class="btn btn-secondary">Back</a>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            @endif
            {!! Form::open(['route' => 'posts.store', 'class' => 'form-group col-md-12']) !!}
                <div class="form-group" >
                    {!! Form::label('label1', 'Title', ['class' => 'control-label']) !!}
                    {!! Form::text('title', '', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('label2', 'Category', ['class' => 'control-label']) !!}
                    {!! Form::select('category', $categories->pluck('categoryname', 'id'), null,['class' => 'form-control select2']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('label1', 'Content', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', null, ['id' => 'editor']) !!}
                </div>
                <div class="form-group">
                        <div class="form-check">
                          {!! Form::radio('status', true, true) !!}
                          {!! Form::label('label3', 'Open') !!}
                          {!! Form::radio('status', false) !!}
                          {!! Form::label('label4', 'Hide') !!}
                        </div>
                    </div>
                <div class="col-12">
                        {{ Form::button(
                            '<i class="fa fa-check-circle"></i>Create',
                            ['type' => 'submit', 'class' => 'btn btn-success float-left'] )
                        }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- ./row -->
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush

@push('scripts')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace( 'editor', {
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );</script>
@endpush
