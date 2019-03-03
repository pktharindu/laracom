require('es6-promise').polyfill()

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import {
    products
} from './modules/products.js'

import {
    cart
} from './modules/cart.js'

export default new Vuex.Store({
    modules: {
        products,
        cart
    }
})
