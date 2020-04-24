<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('created_at', 'desc');
    }

    public function path()
    {
        return '/shop/'.strtolower($this->name);
    }
}
