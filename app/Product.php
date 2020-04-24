<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price()
    {
        return '£'.$this->price;
    }

    public function path()
    {
        return '/shop/'. $this->slug;
    }

    public function img()
    {
        return '/storage/'. $this->image;
    }
}
