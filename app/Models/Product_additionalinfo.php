<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_additionalinfo extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','additional_name', 'additional_value'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
