<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_overview extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'overview_name', 'overview_value'];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
