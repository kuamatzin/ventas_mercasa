<template>
  <div>
    <a class="btn btn-primary" data-toggle="modal" href="#compra_venta">Contrato Compra Venta</a>
    <div class="modal fade" id="compra_venta">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Contrato Compra Venta</h4>
          </div>
          <div class="modal-body">
            <input-lateral :label="'Número de escritura'" :value="sale.numero_escritura"></input-lateral>
            <input-lateral :label="'Fecha de escritura'" :value="sale.fecha_escritura"></input-lateral>
            <input-lateral :label="'Numero de Folio Mercantil'" :value="sale.numero_folio_mercantil"></input-lateral>
            <input-lateral :label="'Fecha de Folio Mercantil'" :value="sale.fecha_folio_mercantil"></input-lateral>
            <input-lateral :label="'Domicilio Fiscal'" :value="sale.domicilio_fiscal"></input-lateral>
            <input-lateral :label="'RFC Vendedor'" :value="sale.rfc_vendedor"></input-lateral>
            <input-lateral :label="'Nacionalidad'" :value="sale.nacionalidad"></input-lateral>
            <input-lateral :label="'Lugar de Nacimiento'" :value="sale.lugar_nacimiento"></input-lateral>
            <input-lateral :label="'Fecha de Nacimiento'" :value="sale.fecha_nacimiento"></input-lateral>
            <input-lateral :label="'Estado Civil'" :value="sale.estado_civil"></input-lateral>
            <input-lateral :label="'Ocupación'" :value="sale.ocupacion"></input-lateral>
            <input-lateral :label="'RFC Cliente'" :value="sale.rfc_cliente"></input-lateral>
            <input-lateral :label="'Esquema'" :value="sale.esquema"></input-lateral>
            <input-lateral :label="'Precio Total Operación'" :value="sale.precio_total_operacion"></input-lateral>
            <input-lateral :label="'Dirección Vendedor'" :value="sale.direccion_vendedor"></input-lateral>
            <input-lateral :label="'Dirección Comprador'" :value="sale.direccion_comprador"></input-lateral>
            <input-lateral :label="'Estado de Firma'" :value="sale.estado_firma"></input-lateral>
            <input-lateral :label="'Fecha Firma de Contrato'" :value="sale.fecha_firma_contrato"></input-lateral>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
            <a :href="url_download" download class="btn btn-primary">Generar documento</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['sale', 'url_download'],
    data() {
      return {

      }
    },
    methods: {
      closeModal() {
        $('#compra_venta').modal('hide');
      }
    }
  }
</script>