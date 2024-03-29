/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('razas', require('./components/razas.vue').default);
Vue.component('mascotas', require('./components/mascotas.vue').default);
Vue.component('denuncias', require('./components/denuncias.vue').default);
Vue.component('noticias', require('./components/noticias.vue').default);
Vue.component('cursos', require('./components/cursos.vue').default);
Vue.component('padrinos', require('./components/padrinos.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//CKEditor
import CKEditor from 'ckeditor4-vue';
Vue.use( CKEditor );

const app = new Vue({
    el: '#app',
});

