<template>
    <div class="row form-input">
      <div class="col-md-4">
        <label>{{label}}</label>
      </div>
      <div class="col-md-8">
        <input type="text" class="form-control input-edit" v-model="dataValue">
      </div>
    </div>
</template>

<style>
  .form-input {
    padding-top: 10px;
    width: 95%;
  }
</style>

<script>
  export default {
    props: ['label', 'value'],
    data() {
      return {
        dataValue: '',
      }
    },
    mounted() {
      this.dataValue = this.value;
    },
    watch: {
      dataValue() {
        this.$emit('update:value', this.dataValue)
      }
    }
  }
</script>