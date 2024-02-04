<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    use HasFactory;
    protected $fillable = ['zone_charge'];


    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function delivery_zone()
    {
        return $this->hasOne(DeliveryZone::class);
    }

}
