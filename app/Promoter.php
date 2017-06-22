<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sale;

class Promoter extends Model
{
    public function sales()
    {
        return $this->belongsToMany(Sale::class);
    }
}
