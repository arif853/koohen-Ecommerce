<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    use HasFactory;
    protected $fillable = ['offer_type_name'];
    public function offers(){
        return $this->hasMany(Offer::class,'offer_type_id','id');
    }
}
