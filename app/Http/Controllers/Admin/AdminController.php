<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Hash;

class AdminController extends Controller
{
    public function register(Request $request)
    {

        $this -> validate($request,[
            'username' => 'required|min:8|max:50|unique:users',
            'displayname' => 'required|max:60',
            'password' => 'required|min:8|max:50',
            'confirmpassword' => 'required|same:password',
            'email' => 'required|email',
        ]);
        $user = new User;
        $user->username = $request['username'];
        $user->displayname = $request['displayname'];
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];

        $user -> save();

        $notification = array(
            'message' => 'Register successful!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function login(User $user,Request $request)
    {
        //
    }
}
