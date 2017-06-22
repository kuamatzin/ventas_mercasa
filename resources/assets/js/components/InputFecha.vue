<template>
  <div >
    <div class="col-md-4">
      <select name="dia" id="diaselect" class="form-control" v-model="selected_day" @change="updateDate">
        <option value="0">Selecciona Día</option>
        <option v-for="day in days" :value="day">{{day}}</option>
      </select>
    </div>

    <div class="col-md-4">
      <select name="month" id="monthselect" class="form-control" v-model="selected_month" @change="updateDate">
        <option v-for="(month, index) in months" :value="index">{{month}}</option>
      </select>
    </div>

    <div class="col-md-4">
      <select name="year" id="yearselect" class="form-control" v-model="selected_year" @change="updateDate">
        <option value="0">Selecciona Año</option>
        <option v-for="year in years" :value="year">{{year}}</option>
      </select>
    </div>

  </div>
</template>

<script>
  export default {
    props: ['date_type', 'original_date'],

    data(){
      return {
        days: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
        months: ['Selecciona Mes','Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        years: ['1971', '1972','1973','1974','1975','1976','1977','1978','1979','1980','1981','1982','1983','1984','1985','1986','1987','1988','1989','1990','1991','1992','1993','1994','1995','1996','1997','1998','1999','2000','2001','2002','2003','2004','2005','2006','2007', '2008', '2009', '2010', '2011','2012', '2013', '2014', '2015', '2016', '2017'],
        selected_year: 0,
        selected_month: 0,
        selected_day: 0,
      }
    },
    watch: {
      original_date: function(val) {
        let date = val.split('-');
        this.selected_year = parseInt(date[0], 10);
        this.selected_month = parseInt(date[1], 10);
        this.selected_day = parseInt(date[2], 10);
      }
    },
    methods: {
      updateDate(){
        let date = this.selected_year + '-' + this.selected_month + '-' + this.selected_day ;
        this.$emit('updateDate', {date: date, date_type: this.date_type});
      }
    }
  }
</script>