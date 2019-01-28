@extends('client.layouts.master')

@section('title', 'Home')

@section('content')
@foreach ($posts as $key => $post)
<div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1000ms">
    <div class="row">
        <div class="col-12">
            <!-- Blog Content -->
            <div class="single-blog-content mt-50">
                <div class="line"></div>
                <a href="#" class="post-tag">{{ $post->category->categoryname }}</a>
                <h4><a href="#" class="post-headline">{{ $post->title}}</a></h4>
                <p>{{$post->introduce}}</p>
                <div class="post-meta">
                    <p>By <a href="#">{{ $post->user->displayname }}</a></p>
                    <p>{{ $post->comments->count() }} comments</p>
                    <p>{{ $post->like }}Like</p>
                    <p>Time:{{ $post->created_at}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
{{ $posts->links() }}
@endsection


