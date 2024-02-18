<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
=======
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091

class Campaign extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($campaign) {
            $campaign->slug = Str::slug($campaign->camp_name);
        });

    }
    public function camp_product()
    {
        return $this->hasMany(Camp_product::class);
    }
>>>>>>> 71d6d2e3987b20dd12848d8991cc00ea1bbbd091
}
