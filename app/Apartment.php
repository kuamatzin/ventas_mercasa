<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class Apartment extends Model
{

    protected $guarded = [];

    protected $appends = ['credit_type_formated'];

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

    public function getCreditTypeFormatedAttribute()
    {
        switch ($this->attributes['credit_type']) {
            case 1:
                return 'Crédito Infonavit';
                break;
            case 2:
                return 'Crédito Foviste';
                break;
            
            default:
                return 'Otro';
                break;
        }
    }
}
