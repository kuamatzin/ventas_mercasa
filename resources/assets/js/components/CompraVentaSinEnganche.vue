<template>
  <div>
    <a class="btn btn-primary" data-toggle="modal" href="#compra_venta_sin_enganche">Compra Venta Sin Enganche</a>
    <div class="modal fade" id="compra_venta_sin_enganche">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Contrato de Compra Venta sin <Enganche></Enganche></h4>
          </div>
          <div class="modal-body">
            <input-lateral :label="'Documento Idenficicacion'" :value="sale.documento_identificacion"></input-lateral>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
            <button type="button" class="btn btn-primary">Generar Contrato</button>
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
        $('#compra_venta_sin_enganche').modal('hide');
      }
    }
  }
</script>