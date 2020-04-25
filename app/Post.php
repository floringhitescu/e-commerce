<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/blog/'.$this->id;
    }

    public function image()
    {
        return '/storage/'. $this->image;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
