<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class Apartment extends Model
{

    protected $guarded = [];

    public function sale()
    {
        return $this->hasOne(Sale::class);
    }

    public function getAvailabilityAttribute($value)
    {
        return $value == true ? 'Disponible' : 'Apartado';
    }

    public function setAvailabilityAttribute($value)
    {
        $this->attributes['availability'] = $value == 'Disponible' ? true : false;
    }
}
