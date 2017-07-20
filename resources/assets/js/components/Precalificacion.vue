<template>
  <div class="row">
    <div class="col-md-8">
      <div v-if="edit == false">
        {{pregrade_edit}}
      </div>
      <div v-else>
        <input type="text" class="form-control" v-model="pregrade_edit">

        <button type="button" class="btn btn-primary btn-xs save" @click="updatePregrade">
          Guardar
        </button>

        <button type="button" class="btn btn-danger btn-xs save" @click="edit = false">
          Cancelar
        </button>
      </div>
    </div>
    <div class="col-md-2">
      <button class="btn btn-warning" @click="edit = !edit">Editar</button>
    </div>
    <div class="col-md-2">
      <button  class="btn btn-danger pull-right" @click="deletePregrade()">Borrar</button>
    </div>
  </div>
</template>

<script>
  export default {
    mounted(){
      this.pregrade_edit = this.pregrade;
    },
    data() {
      return {
        pregrade_edit: '',
        edit: false,
      }
    },
    props: ['pregrade', 'index', 'sale_id'],
    methods: {
      deletePregrade() {
        axios.put('sales/deletePregrade/' + this.sale_id, {index: this.index}).then(
            ({data}) => {
              this.$emit('pregradeDeleted');
            }, error => {
              console.log("Error delete pregrade")
            }
        );
      },
      updatePregrade() {
        axios.put('sales/updatePregrade/' + this.sale_id, {index: this.index, value: this.pregrade_edit}).then(
            ({data}) => {
              this.edit = false;
            }, error => {
              console.log("Error delete pregrade")
            }
        );
      }
    }
  }
</script>