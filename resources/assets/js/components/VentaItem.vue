<template>
  <tr :class="{ info: index % 2 == 0 }" @click="seeSaleModal(sale.id, index)">
    <td>{{sale.client_name}}</td>
    <td>{{sale.client_nss}}</td>
    <td>{{sale.client_birthdate}}</td>
    <td>{{sale.apartment.number}}</td>
    <td v-if="details" >{{sale.water_contract}}</td>
    <td v-if="details">{{sale.credit}}</td>
    <td v-if="details">{{sale.new_pregrade}}</td>
    <td v-if="details">{{sale.advance}}</td>
    <td v-if="details">{{sale.saving}}</td>
    <td v-if="details">{{sale.contract_number}}</td>
    <td v-if="details">{{sale.commission}}</td>
    <td v-if="details">{{sale.case_file}}</td>
    <td v-if="details">{{sale.appraisal_value}}</td>
    <td v-if="details">{{sale.pdf_backup}}</td>
    <td v-if="details">{{sale.sic_format_formated}}</td>
    <td v-if="details">{{sale.statuses}}</td>
    <td v-if="details">{{sale.letter_commitment_subsidy_date}}</td>
    <td v-if="details">{{sale.credit_record_date}}</td>
    <td v-if="details">{{sale.judgment_date}}</td>
    <td v-if="details">{{sale.freedom_tax_date}}</td>
    <td v-if="details">{{sale.sign_date}}</td>
    <td v-if="details">{{sale.deliver_date}}</td>
    <td>
    </td>
  </tr>
</template>

<style>
  td {
    white-space:nowrap;
  }
  tr {
    cursor: pointer;
  }
</style>

<script>
  export default {
    props: ['sale', 'details', 'index'],
    data() {
      return {
        edit: false
      }
    },
    methods: {
      seeSaleModal(sale_id, index) {
        this.$emit('seeSaleModal', sale_id, index)
      }
    }
  }
</script>
