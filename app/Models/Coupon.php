<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['coupons_title','coupons_code','start_date','end_date','percent_value','fixed','free_shipping','quantity','discounts_type','status'];
}
