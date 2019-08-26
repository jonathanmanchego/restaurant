/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
////COMPONENTS FOR TABLA
Vue.component('tabla-carta', require('./components/carta/TablaCarta.vue').default);
Vue.component('item-carta', require('./components/carta/ItemCarta.vue').default);
Vue.component('item-tabla-productos', require('./components/productos/item-modal-listado.vue').default);
Vue.component('tabla-productos', require('./components/productos/modal-listado.vue').default);


//////WIDGETS
Vue.component('success', require('./components/widgets/Success.vue').default);
Vue.component('spiner', require('./components/widgets/Spiner.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
