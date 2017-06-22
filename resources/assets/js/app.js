
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//If you have a modal on your page that exceeds the browser height,
// then you can't scroll in it when closing an second modal. To fix this add:
$(document).on('hidden.bs.modal', '.modal', function () {
  $('.modal:visible').length && $(document.body).addClass('modal-open');
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('proyectos', require('./components/Proyecto.vue'));
Vue.component('input-lateral', require('./components/InputLateral.vue'));
Vue.component('input-fecha', require('./components/InputFecha.vue'));

const app = new Vue({
    el: '#app'
});
