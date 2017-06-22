<template>
  <div>
    <div class="modal fade" id="nuevo-departamento">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nuevo Departamento</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <label>Tipo Crédito: </label>
              </div>
              <div class="col-md-8">
                <select class="form-control" v-model="credit_type" style="width: 90%">
                  <option value="1"> Crédito Infonavit</option>
                  <option value="2"> Crédito Foviste</option>
                </select>
              </div>
            </div>
            <input-lateral label="Andador" :value.sync="walker"></input-lateral>
            <input-lateral label="Nivel" :value.sync="level"></input-lateral>
            <input-lateral label="Lote" :value.sync="lot"></input-lateral>
            <input-lateral label="Manzana" :value.sync="block"></input-lateral>
            <input-lateral label="Número" :value.sync="number"></input-lateral>
            <input-lateral label="Precio" :value.sync="price"></input-lateral>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="saveApartment">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['project_id'],
    data() {
      return {
        credit_type: '',
        walker: '',
        level: '',
        lot: '',
        block: '',
        number: '',
        price: '',
        availability: ''
      }
    },
    methods: {
      closeModal(){
        $('#nuevo-departamento').modal('hide')
      },
      saveApartment(){
        axios.post('/apartments', {
          project_id: this.project_id,
          credit_type: this.credit_type,
          walker: this.walker,
          level: this.level,
          lot: this.lot,
          block: this.block,
          number: this.number,
          price: this.price,
          availability: 1
        }).then(data => {
          this.closeModal();
          this.credit_type = '';
          this.walker = '';
          this.level= '';
          this.lot= '';
          this.block = '';
          this.number = '';
          this.price = '';
          this.$emit('newApartment', data.data)
        }, error => {
          alert(error)
        })
      }
    }
  }
</script>