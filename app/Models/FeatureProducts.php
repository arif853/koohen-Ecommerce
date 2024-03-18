<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeatureProducts extends Model
{
    use HasFactory;
    protected $fillable = ['feature_products_title','image','status'];
    public function products()
    {
        return $this->belongsToMany(Products::class, 'feature_products_with_pivot', 'feature_products_id', 'products_id');
    }
}
