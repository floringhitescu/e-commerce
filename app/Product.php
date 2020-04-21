<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
        return 'shop/'. $this->slug;
    }

    public function img()
    {
        return 'storage/uploads/'. $this->img;
    }
}
