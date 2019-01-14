<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required|unique:posts',
            'content' => 'required|max:1000',
        ],[
            'title.required' => 'The Title field is required',
            'title.unique' => 'The Title field already exist',

            'content.required' => 'The Content field is required',
            'content.max' => 'Maximum of 250 characters',
        ]);

        $title = $request['title'];
        $category = $request['category'];
        $content = $request['content'];
        $status = $request['status'];

        $post = new Post;

        $post['title'] = $title;
        $post['content'] = $content;
        $post['category_id'] = $category;
        $post['user_id'] = 1;
        if($status == true){
            $post['status'] = $status;
        }else {
            $post['status'] = false;
        }


        $post -> save();

        $notification = array(
            'message' => 'Add Post successful!',
            'alert-type' => 'success'
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
