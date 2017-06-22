<?php

namespace App\Services;

use Jenssegers\Date\Date;

class GenerateWordFiles
{

    private function download($document, $filename = "reporte.docx")
    {
        $document->saveAs($filename);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filename));
        flush();
        readfile($filename);
        unlink($filename);
    }

    public function cartaCompromiso($sale)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor('contratos/carta_compromiso.docx');
        $document->setValue('nombre_cliente', $sale->client_name);
        $document->setValue('numero_ife', $sale->client_id);
        $this->download($document, 'cartaCompromiso.docx');
    }

    public function contratoCompraVenta($sale)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor('contratos/contrato_compraventa.docx');
        $document->setValue('nombre_cliente', $sale->client_name);
        $document->setValue('numero_escritura', $sale->numero_escritura);
        $document->setValue('fecha_escritura', $sale->fecha_escritura);
        $document->setValue('numero_folio_mercantil', $sale->numero_folio_mercantil);
        $document->setValue('fecha_folio_mercantil', $sale->fecha_folio_mercantil);
        $document->setValue('domicilio_fiscal', $sale->domicilio_fiscal);
        $document->setValue('rfc_vendedor', $sale->rfc_vendedor);
        $document->setValue('nacionalidad', $sale->nacionalidad);
        $document->setValue('lugar_nacimiento', $sale->lugar_nacimiento);
        $document->setValue('fecha_nacimiento', $sale->fecha_nacimiento);
        $document->setValue('estado_civil', $sale->estado_civil);
        $document->setValue('ocupacion', $sale->ocupacion);
        $document->setValue('rfc_cliente', $sale->rfc_cliente);
        $document->setValue('esquema', $sale->esquema);
        $document->setValue('precio_total_operacion', $sale->precio_total_operacion);
        $document->setValue('direccion_vendedor', $sale->direccion_vendedor);
        $document->setValue('direccion_comprador', $sale->direccion_comprador);
        $document->setValue('estado_firma', $sale->estado_firma);
        $document->setValue('dia_firma_contrato', $sale->fecha_firma_contrato->day);
        $document->setValue('mes_firma_contrato', $sale->fecha_firma_contrato->month);
        $document->setValue('anio_firma_contrato', $sale->fecha_firma_contrato->year);
        $document->setValue('numero_lote', $sale->apartment->lot);
        $document->setValue('numero_manzana', $sale->apartment->block);
        $document->setValue('numero_andador', $sale->apartment->walker);
        $document->setValue('numero_departamento', $sale->number);

        $this->download($document, 'contratoCompraVenta.docx');
    }

    public function contratoCompraVentaSinEnganche($sale)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor('contratos/contrato_compra_venta_sin_enganche.docx');
        $document->setValue('nombre_cliente', $sale->client_name);
        $document->setValue('nacionalidad', $sale->nacionalidad);
        $document->setValue('documento_identificacion', $sale->documento_identificacion);
        $document->setValue('lugar_nacimiento', $sale->lugar_nacimiento);
        $document->setValue('fecha_nacimiento', $sale->fecha_nacimiento);
        $document->setValue('estado_civil', $sale->estado_civil);
        $document->setValue('ocupacion', $sale->ocupacion);
        $document->setValue('rfc_cliente', $sale->rfc_cliente);
        $document->setValue('precio_total_operacion', $sale->precio_total_operacion);
        $document->setValue('direccion_comprador', $sale->direccion_comprador);
        $document->setValue('estado_firma', $sale->estado_firma);
        $document->setValue('dia_firma_contrato', $sale->fecha_firma_contrato->day);
        $document->setValue('mes_firma_contrato', $sale->fecha_firma_contrato->month);
        $document->setValue('anio_firma_contrato', $sale->fecha_firma_contrato->year);
        $document->setValue('numero_lote', $sale->apartment->lot);
        $document->setValue('numero_manzana', $sale->apartment->block);
        $document->setValue('numero_andador', $sale->apartment->walker);
        $document->setValue('numero_departamento', $sale->number);

        $this->download($document, 'cartaCompromiso.docx');
    }

    public function polizaGarantia($sale)
    {
        $document = new \PhpOffice\PhpWord\TemplateProcessor('contratos/poliza_garantia.docx');
        $document->setValue('nombre_cliente', $sale->client_name);
        $document->setValue('numero_lote', $sale->apartment->lot);
        $document->setValue('numero_manzana', $sale->apartment->block);
        $document->setValue('numero_andador', $sale->apartment->walker);
        $document->setValue('lugar_recepcion', $sale->lugar_recepcion);
        $document->setValue('fecha_recepcion', $sale->getFechaRecepcion());
        $document->setValue('fecha_recepcion_mas_un_anio', $sale->getFechaGarantia());

        $this->download($document, 'cartaCompromiso.docx');
    }
}
