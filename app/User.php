<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    protected $fillable = ['username','email','displayname','role'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
