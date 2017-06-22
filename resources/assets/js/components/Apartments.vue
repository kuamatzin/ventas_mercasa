<template>
  <div>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>Disponibilidad</th>
          <th>Tipo de Crédito</th>
          <th>Andador</th>
          <th>Nivel</th>
          <th>Lote</th>
          <th>Manzana</th>
          <th>Número</th>
          <th>Precio</th>
        </tr>
        </thead>
        <tbody>
          <tr is="apartment-item" v-for="(apartment, index) in apartments" :apartment="apartment" :index="index" @seeApartmentModal="seeApartmentModal" @updatedApartment="updatedApartment"></tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
  import ApartmentItem from './ApartmentItem.vue';

  export default {
    props: ['apartments'],
    components: { ApartmentItem },
    data() {
      return {

      }
    },
    methods: {
      seeApartmentModal() {
        alert("HOLA")
      },
      updatedApartment() {
        this.$emit('updatedApartmentToProject');
      }
    }
  }
</script>
