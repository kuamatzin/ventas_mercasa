<template>
  <div>
    <h3>Nuevo Recibo</h3>
    <form enctype="multipart/form-data" @submit.prevent="upload">
    <div class="row">
      <div class="col-md-7">
        <input type="text" class="form-control" placeholder="Pago de Contrato de Agua" v-model="nombre" required>
      </div>
      <div class="col-md-5">
        <div class="fileUpload btn btn-primary">
          <span v-text="filename"></span>
          <input type="file" class="upload" required @change="onFileChange" />
        </div>
      </div>
      <br>
      <br>
    </div>
      <div class="col-md-11">
        <button type="submit" class="btn btn-success pull-right" v-if="saving == false">
          Guardar
        </button>
      </div>
    <br><br>
    </form>
  </div>
</template>

<style scoped>
  .fileUpload {
    position: relative;
    overflow: hidden;
  }
  .fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
  }
</style>

<script>
  export default {
    props: ['sale_id'],
    data(){
      return {
        filename: 'Seleccionar Archivo:',
        image: '',
        nombre: '',
        saving: false
      }
    },
    methods: {
      onFileChange(e) {
        let files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      createImage(file) {
        this.filename = file.name;
        let reader = new FileReader();
        let vm = this;
        reader.onload = (e) => {
          vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
      },
      upload(){
        this.saving = true;
        if(this.nombre != '' && this.image != ''){
          axios.put('/sales/uploadReceipt/' + this.sale_id, {file: this.image, nombre: this.nombre}).then(({data})=> {
            this.$emit('receiptUploaded', data);
            this.nombre = '';
            this.filename = 'Seleccionar Archivo:';
            this.image = '';
            this.saving = false;
          });
        }
        else {
          this.saving = false;
          alert("Campos requeridos");
        }
      }
    }
  }
</script>