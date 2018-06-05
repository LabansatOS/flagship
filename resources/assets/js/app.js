
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

Vue.component('projects-component', require('./components/ProjectsComponent.vue'));

import App from './views/App'
import Home from './views/Home';
import Projects from './views/Projects';
import Project from './views/Project';

const router = new VueRouter({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Home,
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
