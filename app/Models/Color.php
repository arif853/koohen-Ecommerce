<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['color_code', 'color_name', 'status'];

    public function products()
    {
        return $this->belongsToMany(Products::class, 'products_colors', 'color_id', 'product_id');
    }

    public function productCount()
    {
        return $this->products()->count();
    }

}
