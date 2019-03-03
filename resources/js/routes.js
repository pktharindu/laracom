/*
|-------------------------------------------------------------------------------
| routes.js
|-------------------------------------------------------------------------------
| Contains all of the routes for the application
*/

/*
    Imports Vue and VueRouter to extend with the routes.
*/
import Vue from 'vue'
import VueRouter from 'vue-router'

/*
    Extends Vue to use Vue Router
*/
Vue.use(VueRouter)

export default new VueRouter({
    routes: [{
            path: '/',
            name: 'home',
            component: Vue.component('Home', require('./pages/Home.vue'))
        },
        {
            path: '/products',
            name: 'products',
            component: Vue.component('Products', require('./pages/Products.vue'))
        },
        {
            path: '/products/:id',
            name: 'product',
            component: Vue.component('Product', require('./pages/Product.vue'))
        }
    ]
})
