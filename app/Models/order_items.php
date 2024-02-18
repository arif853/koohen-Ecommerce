<?php

namespace App\Models;

use App\Models\Size;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class order_items extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'color_id', 'size_id' , 'order_id', 'price', 'quantity', 'comment'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function product_sizes(){

        return $this->belongsToMany(Size::class, 'products_sizes', 'product_id','size_id');
        
    }

}
