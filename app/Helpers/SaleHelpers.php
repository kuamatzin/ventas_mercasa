<?php

namespace App\Helpers;

use Jenssegers\Date\Date;
use DateTime;

trait SaleHelpers {

    private function transformDate($date)
    {
        if ($date == null || $date == ''){
            return "Sin formato";
        }
        return ucfirst(Date::createFromFormat('Y-m-d H:i:s', $date)->toFormattedDateString());
    }



    public function getLetterCommitmentSubsidyDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getClientBirthdateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getOriginalClientBirthdateAttribute()
    {
        return $this->getOriginal('client_birthdate');
    }

    public function getOriginalLetterCommitmentSubsidyDateAttribute()
    {
        return $this->getOriginal('letter_commitment_subsidy_date');
    }

    public function getOriginalCreditRecordDateAttribute()
    {
        return $this->getOriginal('credit_record_date');
    }

    public function getOriginalJudgmentDateAttribute()
    {
        return $this->getOriginal('judgment_date');
    }

    public function getOriginalFreedomTaxDateAttribute()
    {
        return $this->getOriginal('freedom_tax_date');
    }

    public function getOriginalSignDateAttribute()
    {
        return $this->getOriginal('sign_date');
    }

    public function getOriginalDeliverDateAttribute()
    {
        return $this->getOriginal('deliver_date');
    }

    public function getCreditRecordDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getJudgmentDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getFreedomTaxDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getSignDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function getDeliverDateAttribute($value)
    {
        return $this->transformDate($value);
    }

    public function setClientBirthdateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['client_birthdate'] = $value;
        }
        else {
            $this->attributes['client_birthdate'] = $this->getOriginal('client_birthdate');
        }
    }

    public function setLetterCommitmentSubsidyDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['letter_commitment_subsidy_date'] = $value;
        }
        else {
            $this->attributes['letter_commitment_subsidy_date'] = $this->getOriginal('letter_commitment_subsidy_date');
        }
    }

    public function setCreditRecordDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['credit_record_date'] = $value;
        }
        else {
            $this->attributes['credit_record_date'] = $this->getOriginal('credit_record_date');
        }
    }

    public function setJudgmentDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['judgment_date'] = $value;
        }
        else {
            $this->attributes['judgment_date'] = $this->getOriginal('judgment_date');
        }
    }

    public function setFreedomTaxDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['freedom_tax_date'] = $value;
        }
        else {
            $this->attributes['freedom_tax_date'] = $this->getOriginal('freedom_tax_date');
        }
    }

    public function setSignDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['sign_date'] = $value;
        }
        else {
            $this->attributes['sign_date'] = $this->getOriginal('sign_date');
        }
    }

    public function setDeliverDateAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['deliver_date'] = $value;
        }
        else {
            $this->attributes['deliver_date'] = $this->getOriginal('deliver_date');
        }
    }

    public function setFechaFirmaContratoAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['fecha_firma_contrato'] = $value;
        }
        else {
            $this->attributes['fecha_firma_contrato'] = $this->getOriginal('fecha_firma_contrato');
        }
    }

    public function setFechaRecepcionAttribute($value)
    {
        if (DateTime::createFromFormat('Y-m-d', $value) !== FALSE) {
            $this->attributes['fecha_recepcion'] = $value;
        }
        else {
            $this->attributes['fecha_recepcion'] = $this->getOriginal('fecha_recepcion');
        }
    }

}