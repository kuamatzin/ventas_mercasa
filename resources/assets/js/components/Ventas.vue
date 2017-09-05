<template>
  <div>
    <button v-if="details == false" type="button" class="btn btn-default" @click="seeDetails">Ver Más</button>
    <button v-else type="button" class="btn btn-default" @click="seeDetails">Ver Menos</button>

    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="col-md-3">Cliente</th>
            <th class="col-md-3">NSS</th>
            <th class="col-md-3">Fecha Nacimiento</th>
            <th class="col-md-3">Departamento</th>
            <th v-if="details">Contrato Agua</th>
            <th v-if="details">Crédito</th>
            <th v-if="details">Nueva Precalificación</th>
            <th v-if="details">Apartado</th>
            <th v-if="details">Ahorro</th>
            <th v-if="details">Número de contrato</th>
            <th v-if="details">Comisión</th>
            <th v-if="details">Expediente</th>
            <th v-if="details">Avaluo</th>
            <th v-if="details">PDF Respaldo</th>
            <th v-if="details">Formato SIC</th>
            <th v-if="details">Status</th>
            <th v-if="details">Carta Compromiso</th>
            <th v-if="details">Constancia Credito</th>
            <th v-if="details">Dictaminacion</th>
            <th v-if="details">Libertad Gravamen</th>
            <th v-if="details">Fecha Firma</th>
            <th v-if="details">Fecha Entrega</th>
          </tr>
        </thead>
        <tbody>
        <tr is="venta-item" v-for="(sale, index) in sales" :sale="sale" :details="details" :index="index" @seeSaleModal="seeSaleModal"></tr>
        </tbody>
      </table>
    </div>


    <modal-edit-sale :active_sale="active_sale" @saleUpdated="saleUpdated"></modal-edit-sale>

  </div>
</template>

<script>
  import VentaItem from './VentaItem.vue';
  import ModalEditSale from './EditSale.vue';

  export default {
    components: { VentaItem, ModalEditSale },
    props: ['sales'],
    data() {
      return {
        details: false,
        active_sale: '',
        active_index: ''
      }
    },
    methods: {
      seeDetails() {
        this.details = !this.details;
      },
      seeSaleModal(sale_id, index) {
        this.active_index = index;
        let that = this;
        axios.get('sales/' + sale_id).then(response => {
          that.active_sale = response.data;
          $('#modal-id').modal('show');
        }, error => {
          console.log(error)
        });

      },
      saleUpdated(saleUpdated) {
        $('#modal-id').modal('hide');
        this.sales.push(saleUpdated);
        this.sales[this.active_index] = saleUpdated;
        this.sales.splice(this.sales.length - 1, 1);
      }
    }
  }
</script>
