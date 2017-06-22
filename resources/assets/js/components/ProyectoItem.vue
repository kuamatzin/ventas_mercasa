<template>
  <tr :class="{ warning: index % 2 == 0 }">
    <td v-if="editing == false" class="clickme" @click="displaySales(project.id, project.name)">
      {{project.name}}
    </td>
    <td v-else>
      <input type="text" name="name"  class="form-control" v-model="project.name">

      <button type="button" class="btn btn-primary btn-xs save" @click="saveProject(project)">
        Guardar
      </button>

      <button type="button" class="btn btn-danger btn-xs save" @click="editing = false">
        Cancelar
      </button>

    </td>
    <td>
      <button type="button" class="btn btn-default" @click="editing = true">
        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
      </button>
    </td>
  </tr>
</template>

<style>
  .save {
    margin-top: 1em;
  }
  .clickme {
    cursor: pointer;
  }
  .clickme:hover {
    color: #216C9D;
  }
</style>


<script>
  export default {
    props: ['project', 'index'],
    mounted() {
    },
    data() {
      return {
        editing: false,
        isActive: true
      }
    },
    methods: {
      saveProject(project)  {
        let that = this;
        axios.put('projects/' + project.id + 'update', {name: project.name}).then(response => {
          that.editing = false;
        }, error => {
          console.log(error)
        });
      },
      displaySales(project_id, project_name) {
        this.$emit('displaySales', {id: project_id, name: project_name});
      }
    }
  }
</script>

