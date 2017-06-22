<template>
  <div>
    <div class="row">
      <div class="col-md-2">
        <h3>Proyectos</h3>
      </div>
      <div class="col-md-6">
        <br>
        <button class="btn btn-success pull-left" data-toggle="modal" href="#nuevo-proyecto">
          Nuevo Proyecto
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <tr is="proyecto-item" v-for="(project, index) in projects" :index="index" :project="project" @displaySales="displaySales" ></tr>
        </tbody>
      </table>
    </div>
    <img src="img/loading.gif" alt="" width="200px" class="img-responsive center-block" v-show="loading">
    <hr>
    <div v-show="admin_panel">

      <h2>{{active_project_name}}</h2>
      <br>
      <!-- TAB NAVIGATION -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Ventas</a></li>
        <li><a href="#tab2" role="tab" data-toggle="tab">Departamentos</a></li>
      </ul>
      <!-- TAB CONTENT -->
      <div class="tab-content">
        <div class="active tab-pane fade in" id="tab1">
          <div class="row">
            <div class="col-md-1">
              <h2>Ventas</h2>
            </div>
            <div class="col-md-4">
              <br>
              <a class="btn btn-primary" data-toggle="modal" href="#nueva-venta">Nueva Venta</a>
            </div>
          </div>
          <br><br>
          <ventas :sales="sales"></ventas>
        </div>
        <div class="tab-pane fade" id="tab2">
          <div class="row">
            <div class="col-md-2">
              <h2>Departamentos</h2>
            </div>
            <div class="col-md-4">
              <br>
              <button class="btn btn-success" data-toggle="modal" href="#nuevo-departamento">
                Agregar Departamento
              </button>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="form-group">
              <label for="availability" class="col-sm-2 control-label">Disponibilidad</label>
              <div class="col-sm-2">
                <select class="form-control" id="availability" v-model="availability" @change="displayApartments">
                  <option value="0">Indiferente</option>
                  <option value="1">Disponibles</option>
                  <option value="2">Apartados</option>
                </select>
              </div>
            </div>
          </div>

          <br>
          <apartments :apartments="apartments" @updatedApartmentToProject="updatedApartmentToProject"></apartments>
        </div>
      </div>

    </div>
    <nuevo-proyecto @newProject="newProject"></nuevo-proyecto>
    <nueva-venta @newSale="newSale" :project_id="active_project_id" :avaliable_apartments="avaliable_apartments"></nueva-venta>
    <nuevo-departamento @newApartment="newApartment" :project_id="active_project_id"></nuevo-departamento>
  </div>
</template>

<script>
  import ProyectoItem from './ProyectoItem.vue';
  import Apartments from './Apartments.vue';
  import Ventas from './Ventas.vue';
  import NuevoProyecto from './NuevoProyecto.vue';
  import NuevoDepartamento from './NuevoDepartamento.vue';
  import NuevaVenta from './NuevaVenta.vue';

  export default {
    components: { ProyectoItem, Apartments, Ventas, NuevoProyecto, NuevoDepartamento, NuevaVenta },
    mounted() {
      this.getProjects()
    },
    data() {
      return {
        projects: '',
        sales: '',
        apartments: '',
        editing: false,
        admin_panel: false,
        active_project_id: '',
        avaliable_apartments: '',
        availability: '0',
        loading: false,
        active_project_name: ''
      }
    },
    methods: {
      getProjects() {
        let that = this;
        axios.get('/projects').then(response => {
          that.projects = response.data;
      }, error => {
          console.log(error)
      });
      },
      displaySales(project) {
        this.loading = true;
        this.admin_panel = false;
        this.active_project_name = project.name;
        this.getAvaliableApartments(project.id);
        this.active_project_id = project.id;
        let that = this;
        axios.get('sales/?project_id=' + project.id).then(response => {
          this.loading = false;
          this.admin_panel = true;
          that.sales = response.data;
          that.displayApartments();
        }, error => {});
      },
      displayApartments(){
        let that = this;
        axios.get('apartments/?project_id=' + this.active_project_id + '&availability=' + this.availability).then(response => {
          that.apartments = response.data
        }, error => {});
      },
      newProject(project){
        this.projects.push(project)
      },
      newApartment(apartment){
        this.apartments.push(apartment)
        this.getAvaliableApartments(this.active_project_id);
      },
      newSale(sale) {
        this.sales.push(sale)
        this.getAvaliableApartments(this.active_project_id);
        this.displayApartments();
      },

      getAvaliableApartments(project_id){
        axios.get('/sales/avaliable/' + project_id).then(data => this.avaliable_apartments = data.data);
      },
      updatedApartmentToProject() {
        this.getAvaliableApartments(this.active_project_id);
      }
    }
  }
</script>
