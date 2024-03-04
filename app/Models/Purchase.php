<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['supplier_id','reference','purchase_date','total'];

    public function supplier()
    {
        return $this->hasMany(Supplier::class,'supplier_id');
    }

    public function stock()
    {
        return $this->belongsTo(Product_stock::class, 'purchase_id');
    }
}
