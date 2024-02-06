<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product_thumbnail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','product_thumbnail'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($products) {
            $products->slug = Str::slug($products->product_name);
        });
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

}
