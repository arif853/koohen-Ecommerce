<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['zone_charge'];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function upazillas()
    {
        return $this->hasMany(Upazilla::class, 'district_id');
    }

    public function postcode()
    {
        return $this->hasMany(Postcode::class, 'district_id');
    }

    public function delivery_zone()
    {
        return $this->hasOne(DeliveryZone::class);
    }
}
