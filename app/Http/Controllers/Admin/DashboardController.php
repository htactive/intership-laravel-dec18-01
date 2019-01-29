<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $countpost = Post::count();
        $countuser = User::count();
        $countlike = Post::sum('like');
        $countcomment = Comment::count();
        return view('admin.dashboard',['countpost'=>$countpost,'countuser'=>$countuser,'countlike'=>$countlike,'countcomment'=>$countcomment]);
    }
}
