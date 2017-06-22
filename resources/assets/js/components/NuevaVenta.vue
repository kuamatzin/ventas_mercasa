<template>
  <div>
    <div class="modal fade" id="nueva-venta">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nueva Venta</h4>
          </div>
          <div class="modal-body">
            <div class="alert alert-danger" v-if="errors">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <ul class="list-group">
                <li v-for="error in errors" v-if="error.length > 0">{{error[0]}}</li>
              </ul>
            </div>
            <div class="row">
              <label for="apartment_id" class="col-sm-4">Número de Departamento</label>
              <div class="col-md-7">
                <select name="apartment_id" class="form-control" v-model="apartment_sale">
                  <option v-for="apartment in avaliable_apartments" :value="apartment.id">{{apartment.number}}</option>
                </select>
              </div>
            </div>
            <input-lateral label="Nombre de Cliente" :value.sync="client_name"></input-lateral>
            <input-lateral label="NSS" :value.sync="client_nss"></input-lateral>

            <div class="row form-input">
              <div class="col-md-4">
                <label>Fecha de Nacimiento</label>
              </div>
              <div class="col-md-8">
                <input-fecha @updateDate="updateDate" date_type="'client_birthdate'"></input-fecha>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="saveSale">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
  li {
    margin-left: 15px;
  }
</style>

<script>
  export default {
    props: ['project_id', 'avaliable_apartments'],

    data(){
      return {
        apartment_sale: '',
        client_name: '',
        client_nss: '',
        client_birthdate: '',
        errors: false
      }
    },
    methods: {
      closeModal(){
        $('#nueva-venta').modal('hide');
      },
      saveSale(){
        axios.post('/sales', {
          apartment_id: this.apartment_sale,
          client_name: this.client_name,
          client_nss: this.client_nss,
          client_birthdate: this.client_birthdate
        }).then(data => {
          if(data.data.errors) {
            this.errors = data.data.data;
            return true;
          }
          this.$emit('newSale', data.data)
          this.closeModal();
        }, error => alert("Error"));
      },
      updateDate(data){
        this.client_birthdate = data.date;
      }
    }
  }
</script>