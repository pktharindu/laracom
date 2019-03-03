require('es6-promise').polyfill()

import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import {
    products
} from './modules/products.js'

export default new Vuex.Store({
    modules: {
        products
    }
})
