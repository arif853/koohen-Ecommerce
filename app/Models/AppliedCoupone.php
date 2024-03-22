<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedCoupone extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','order_id','coupone_id','coupone_code','is_ordered'];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'order_id');
    }

    public function coupone()
    {
        return $this->hasOne(Coupon::class, 'coupone_id');
    }
}
