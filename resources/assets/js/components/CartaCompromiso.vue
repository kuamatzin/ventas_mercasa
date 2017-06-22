<template>
  <div>
    <a class="btn btn-primary" data-toggle="modal" href="#carta_compromiso">Carta Compromiso</a>
    <div class="modal fade" id="carta_compromiso">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Carta Compromiso</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <label>IFE: </label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control input-edit" v-model="ife">
              </div>
            </div>
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
    props: ['ife', 'url_download'],
    data() {
      return {

      }
    },
    methods: {
      closeModal() {
        $('#carta_compromiso').modal('hide');
      }
    }
  }
</script>