<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_extra extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','warranty_type','return_policy','delivery_type','emi'];
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
