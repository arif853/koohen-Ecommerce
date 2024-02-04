<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['supplier_name','address','phone','email','balance','status'];

    public function product()
    {
        return $this->hasOne(Products::class);
    }
}
