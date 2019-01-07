<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['categoryname','describe','status'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
