<template>
  <div>
    <div class="modal fade" id="nuevo-proyecto">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Nuevo Proyecto</h4>
          </div>
          <div class="modal-body">
            <input-lateral label="Nombre" :value.sync="nombre"></input-lateral>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" @click="closeModal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="saveProject">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        nombre: ''
      }
    },
    methods: {
      saveProject(){
        axios.post('/projects', {name: this.nombre}).then(data => {
          this.$emit('newProject', data.data);
          this.closeModal();
        });
      },
      closeModal(){
        $('#nuevo-proyecto').modal('hide');
      }
    }
  }
</script>