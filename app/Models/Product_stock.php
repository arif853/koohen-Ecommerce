<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_stock extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','size_id','stock','price'];

    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
