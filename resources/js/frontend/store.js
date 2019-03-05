require('es6-promise').polyfill()

import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'

Vue.use(Vuex)

import {
    products
} from './modules/products.js'

import {
    cart
} from './modules/cart.js'

export default new Vuex.Store({
    plugins: [createPersistedState()],
    modules: {
        products,
        cart
    }
})
