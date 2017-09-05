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
        'fecha_recepcion',
        'sic_format_date',
    ];

    protected $casts = [
        'new_pregrade' => 'array',
        'recibos' => 'array'
    ];

    protected $appends = [
        'original_client_birthdate',
        'original_letter_commitment_subsidy_date',
        'original_credit_record_date',
        'original_judgment_date',
        'original_freedom_tax_date',
        'original_sign_date',
        'original_deliver_date',
        'original_sic_format_date',
        'sic_format_formated',
        'statuses'
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

    public function getStatusesAttribute()
    {
        if ($this->attributes['status'] == 1) {
            return "Carta Compromiso";
        } elseif ($this->attributes['status'] == 2) {
            return "Constancia de Crédito";
        } elseif ($this->attributes['status'] == 3) {
            return "Dictaminación";
        } elseif ($this->attributes['status'] == 4) {
            return "Libertad de Gravamen";
        } elseif ($this->attributes['status'] == 5) {
            return "Fecha de Firma";
        } else {
            return "Fecha de Entrega";
        }
    }

    public function getSicFormatFormatedAttribute()
    {
        switch ($this->attributes['sic_format']) {
            case 1:
                return "Sin recibir";
                break;
            
            case 2:
                return "Recibido";
                break;
            
            case 3:
                return "Entregado";
                break;
            
            default:
                return "Otro";
                break;
        }
    }

}
