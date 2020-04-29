/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router';
import routes from './routes';
import store from './store/store';
import App from './views/App';
import helpers from './helpers';
import axios from 'axios';
import VeeValidate from 'vee-validate';

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(VeeValidate);

const router = new VueRouter({
    routes: routes,
    mode: 'history',
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (! store.state.authentication.loggedIn) {
      next({
        name: 'login',
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.requiresVisitor)) {
    if (store.state.authentication.loggedIn) {
      next({
        name: 'home',
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

Vue.mixin({
  methods: helpers
})

Vue.prototype.$appUrl = window.location.protocol + '//' + window.location.hostname;

window.app = new Vue({
    el: '#app',

    store: store,
    router: router,
    components: { App },
});