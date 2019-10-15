require('./bootstrap');

window.Vue = require('vue');

Vue.component('note', require('./components/Note.vue').default);

const app = new Vue({
    el: '#app',
});
