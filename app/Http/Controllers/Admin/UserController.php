<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts;
        return view('admin.users.show',['user'=>$user,'posts'=>$posts,'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $user = User::find($id);
        if($user->status == true)
        {
            $user->status = false;
        }
        else{
            $user->status = true;
        }
        $user->save();
        $notification = array(
            'message' => 'Change status successful!',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }
    public function destroy(User $user)
    {
        if($user->posts->count() > 0){
            $notification = array(
                'message' => 'You can not delete a user that has posts filed. You can block user.',
                'alert-type' => 'warning'
            );
            return redirect()->route('users.index')->with($notification);
        }
        User::where('id', $user->id)->delete();
        $notification = array(
            'message' => 'Delete user successful!',
            'alert-type' => 'success'
        );
        return redirect()->route('users.index')->with($notification);
    }
}
