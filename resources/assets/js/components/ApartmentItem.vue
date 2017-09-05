<template>
  <tr :class="{ info: index % 2 == 0 }">
    <td @click="editing = true" v-if="editing == false">{{apartment.availability}}</td>
    <td v-else>
      <select class="form-control" v-model="apartment.availability">
        <option value="Disponible"> Disponible</option>
        <option value="Apartado"> Apartado</option>
      </select>
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.credit_type_formated}}</td>
    <td v-else>
      <select class="form-control" v-model="apartment.credit_type">
        <option value="1">Crédito Infonavit</option>
        <option value="2"> Crédito Foviste</option>
      </select>
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.walker}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.walker">
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.level}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.level">
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.lot}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.lot">
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.block}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.block">
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.number}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.number">
    </td>
    <td @click="editing = true" v-if="editing == false">{{apartment.price}}</td>
    <td v-else>
      <input type="text" class="form-control" v-model="apartment.price">

      <button type="button" class="btn btn-primary btn-xs save" @click="saveApartment">
        Guardar
      </button>

      <button type="button" class="btn btn-danger btn-xs save" @click="editing = false">
        Cancelar
      </button>
    </td>
  </tr>
</template>

<script>
  export default {
    props: ['apartment', 'index'],
    data() {
      return {
        editing: false,
      }
    },
    methods: {
      saveApartment() {
        axios.put('/apartments/' + this.apartment.id, {apartment: this.apartment}).then(response => {
          this.$emit('updatedApartment');
          this.editing = false;
        }, error => {});
      }
    }
  }
</script>