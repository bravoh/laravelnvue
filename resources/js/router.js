import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'

Vue.use(Router)

export default new Router({
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/profile',
      name: 'profile',
      component: () => import('./views/Profile.vue')
    },
    {
      path: '/clients/index',
      name: 'clients.index',
      component: () => import('./views/Clients/ClientsIndex.vue'),
    },
    {
      path: '/clients/new',
      name: 'clients.new',
      component: () => import('./views/Clients/ClientsForm.vue'),
    },
    {
      path: '/clients/:id',
      name: 'clients.edit',
      component: () => import('./views/Clients/ClientsForm.vue'),
      props: true
    },

    //Products
    {
      path: '/products/index',
      name: 'products.index',
      component: () => import('./views/Products/Index.vue'),
    },
    {
      path: '/products/new',
      name: 'products.new',
      component: () => import('./views/Products/Form.vue'),
    },
    {
      path: '/products/:id',
      name: 'products.edit',
      component: () => import('./views/Products/Form.vue'),
      props: true
    },
    //Supplier
    {
      path: '/suppliers/index',
      name: 'suppliers.index',
      component: () => import('./views/Suppliers/Index.vue'),
    },
    {
      path: '/suppliers/new',
      name: 'suppliers.new',
      component: () => import('./views/Suppliers/Form.vue'),
    },
    {
      path: '/suppliers/:id',
      name: 'suppliers.edit',
      component: () => import('./views/Suppliers/Form.vue'),
      props: true
    }
  ],
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  }
})
