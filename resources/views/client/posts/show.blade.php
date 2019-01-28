@extends('client.layouts.master')

@section('title','J')

@section('content')
<!-- ##### Post Content Area ##### -->
<div class="col-12 col-lg-9">
    <!-- Single Blog Area  -->
    <div class="single-blog-area blog-style-2 mb-50">
        <!-- Blog Content -->
        <div class="single-blog-content">
            <div class="line"></div>
            <a href="#" class="post-tag">{{ $post->category->categoryname }}</a>
            <h4><a href="#" class="post-headline mb-0">{{ $post->title }}</a></h4>
            <div class="post-meta mb-50">
                <p>By <a href="#">{{ $post->user->displayname }}</a></p>
                <p>{{ $post->comments->count() }} comments</p>
            </div>
            {!! $post->content !!}
        </div>
    </div>

    <!-- About Author -->
    <div class="blog-post-author mt-100 d-flex">
        <div class="author-thumbnail">
            <img src="{{ asset('frontend/img/bg-img/b6.jpg')}}" alt="">
        </div>
        <div class="author-info">
            <div class="line"></div>
            <span class="author-role">Author</span>
            <h4><a href="#" class="author-name">{{ $post->user->displayname }}</a></h4>
        </div>
    </div>
    <!-- Comment Area Start -->

    <div class="comment_area clearfix mt-70">
        <h5 class="title">Comments</h5>
        <ol>
            @foreach ($post->comments as $comment)
            <!-- Single Comment Area -->
            <li class="single_comment_area">
                <!-- Comment Content -->
                <div class="comment-content d-flex">
                    <!-- Comment Author -->
                    <div class="comment-author">
                        <img src="{{asset('frontend/img/bg-img/b7.jpg')}}" alt="author">
                    </div>
                    <!-- Comment Meta -->
                    <div class="comment-meta">
                        <a href="#" class="post-date"> {{$comment->created_at}} </a>
                        <p><a href="#" class="post-author">{{$comment->user->displayname}}</a></p>
                        <p>{{$comment->content}}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ol>
    </div>

    <div class="post-a-comment-area mt-70">
        <h5>Leave a reply</h5>
        <!-- Reply Form -->
        <form action="#" method="post">
            <div class="row">
                <div class="col-12">
                    <div class="group">
                        <textarea name="message" id="message" required></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Comment</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn original-btn">Reply</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
