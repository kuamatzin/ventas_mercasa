<template>
  <div class="modal fade" id="historial-recibos">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
          </button>
          <h4 class="modal-title">Historial Recibos</h4>
        </div>
        <div class="modal-body">
          <file-upload :sale_id="sale_id" @receiptUploaded="receiptUploaded"></file-upload>
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h4>Recibos</h4>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                  <tr>
                    <th>Recibo</th>
                    <th>Descargar</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr v-for="recibo in receipts">
                    <td>{{recibo.nombre}}</td>
                    <td>
                      <a :href="recibo.file" download class="btn btn-success">Descargar</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import FileUpload from './FileUpload.vue';

  export default {
    props: ['sale_id', 'recibos'],
    data(){
      return {
        receipts: '',
        count: 0
      }
    },
    components: { FileUpload },
    watch: {
      recibos: function(){
        if(this.count == 0){
          this.receipts =  this.recibos;
        }
      }
    },
    methods: {
      closeModal(){
        $('#historial-recibos').modal('hide');
      },
      receiptUploaded(recibos){
        this.count = 1;
        this.receipts = recibos;
      }

    }
  }
</script>