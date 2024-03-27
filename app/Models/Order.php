<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id','subtotal','discount','tax','total','is_shipping_different','shipping_cost','comment','status','total_paid','total_due','is_pos'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order_item()
    {
        return $this->hasMany(order_items::class);
    }

    public function shipping()
    {
        return $this->hasOne(shipping::class);
    }

    public function transaction()
    {
        return $this->hasOne(transactions::class);
    }

    public function orderStatus()
    {
        return $this->hasOne(Orderstatus::class);
    }

    public function appliedCoupone()
    {
        return $this->belongsTo(AppliedCoupone::class, 'order_id');
    }
}
