require('./bootstrap');

window.Vue = require('vue');

window.Event = new Vue();

import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import myUpload from 'vue-image-crop-upload';



import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
    // { path: '*', component: require('./components/NotFoundComponent.vue') },
    // { path: '/dashboard', component: require('./components/Dashboard.vue') },
    // { path: '/users', component: require('./components/Users.vue') },
    // { path: '/profile', component: require('./components/Profile.vue') },
];

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('create-job', require('./components/CreateJob.vue').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-profile', require('./components/CreateProfile.vue').default);

Vue.component('nav-bar', require('./components/Navbar.vue').default);
Vue.component('app-wraper', require('./components/layout/App.vue').default);
Vue.component('my-upload', myUpload);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
