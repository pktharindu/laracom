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
    mode: 'history',
    routes: [{
        path: '/',
        component: Vue.component('Layout', require('./pages/Layout.vue').default),
        children: [{
                path: '',
                name: 'home',
                component: Vue.component('Home', require('./pages/Home.vue').default)
            },
            {
                path: 'products/:id',
                name: 'product',
                component: Vue.component('Product', require('./pages/Product.vue').default)
            }
        ]
    }]
})
