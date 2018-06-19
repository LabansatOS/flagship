
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

window.Vue = Vue;

Vue.use(VueRouter);

Vue.component('projects-component', require('./components/ProjectsComponent.vue'));
Vue.component('user-component', require('./components/NavbarComponent.vue'));
Vue.component('image-upload', require('./components/ImageUploadComponent.vue'));

import App from './views/App'
import Home from './views/Home';
import Projects from './views/Projects';
import Project from './views/Project';
import UserProfile from './views/UserProfile';
import BasicData from './views/BasicData.vue';
import Address from './views/Address';
import BankAccount from './views/BankAccount';
import OfficialID from './views/OfficialID';
import Phones from './views/Phones';

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Home,
    },
    {
      path: '/profile',
      component: UserProfile,
      children: [
        {
          path: 'basic',
          component: BasicData,
        },
        {
          path: 'address',
          component: Address,
        },
        {
          path: 'id',
          component: OfficialID,
        },
        {
          path: 'account',
          component: BankAccount,
        },
        {
          path: 'phones',
          component: Phones,
        },
      ],
    },
    {
      path: '/projects',
      component: Projects,
    },
    {
      path: '/project/:id',
      component: Project,
    },
  ],
});

const app = new Vue({
  el: '#app',
  components: { App },
  router,
});
