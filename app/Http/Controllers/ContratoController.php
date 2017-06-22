<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Services\GenerateWordFiles;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    protected $documentGenerator;

    public function __construct()
    {
        $this->documentGenerator = new GenerateWordFiles();
    }

    public function cartaCompromiso(Sale $sale)
    {
        $this->documentGenerator->cartaCompromiso($sale);
    }

    public function contratoCompraVenta(Sale $sale)
    {
        $this->documentGenerator->contratoCompraVenta($sale);
    }

    public function contratoCompraVentaSinEnganche(Sale $sale)
    {
        $this->documentGenerator->contratoCompraVentaSinEnganche($sale);
    }

    public function polizaGarantia(Sale $sale)
    {
        $this->documentGenerator->polizaGarantia($sale);
    }
}
