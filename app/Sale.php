<?php

namespace App;

use App\Helpers\SaleHelpers;
use Carbon\Carbon;
use App\Promoter;
use App\Apartment;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Sale extends Model
{

    use SaleHelpers;

    protected $guarded = [];

    protected $dates = [
        'client_birthdate',
        'letter_commitment_subsidy_date',
        'credit_record_date',
        'judgment_date',
        'freedom_tax_date',
        'sign_date',
        'deliver_date',
        'fecha_firma_contrato',
        'fecha_recepcion'
    ];

    protected $casts = [
        'new_pregrade' => 'array'
    ];

    protected $appends = [
        'original_client_birthdate',
        'original_letter_commitment_subsidy_date',
        'original_credit_record_date',
        'original_judgment_date',
        'original_freedom_tax_date',
        'original_sign_date',
        'original_deliver_date',
    ];


    public function promoters()
    {
        return $this->belongsToMany(Promoter::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function getWaterContractAttribute($value)
    {
        if ($value == 1) {
            return "Incluido";
        }
        elseif ($value == 2 ) {
            return "Pagado";
        }
        return "Pendiente";
    }

    public function setWaterContractAttribute($value)
    {
        if ($value == "Incluido") {
            $this->attributes['water_contract'] = 1;
        }
        elseif ($value == "Pagado" ) {
            $this->attributes['water_contract'] = 2;
        }
        else {
            $this->attributes['water_contract'] = 3;
        }
    }

    public function getStatusesAttribute($value)
    {
        if ($value == 1) {
            return "Carta Compromiso";
        } elseif ($value == 2) {
            return "Constancia de Crédito";
        } elseif ($value == 3) {
            return "Dictaminación";
        } elseif ($value == 4) {
            return "Libertad de Gravamen";
        } elseif ($value == 5) {
            return "Fecha de Firma";
        } else {
            return "Fecha de Entrega";
        }
    }

}
