import ProductAPI from '../api/product.js'

export const products = {
    state: {
        products: [],
        productsLoadStatus: 0,
        product: {},
        productLoadStatus: 0
    },

    actions: {
        loadProducts({
            commit
        }, page) {
            commit('SET_PRODUCTS_LOAD_STATUS', 1)

            ProductAPI.getProducts(page)
                .then(function (response) {
                    commit('SET_PRODUCTS', response.data)
                    commit('SET_PRODUCTS_LOAD_STATUS', 2)
                })
                .catch(function () {
                    commit('SET_PRODUCTS', [])
                    commit('SET_PRODUCTS_LOAD_STATUS', 3)
                })
        },

        loadProduct({
            commit
        }, data) {
            commit('SET_PRODUCT_LOAD_STATUS', 1)

            ProductAPI.getProduct(data.id)
                .then(function (response) {
                    commit('SET_PRODUCT', response.data)
                    commit('SET_PRODUCT_LOAD_STATUS', 2)
                })
                .catch(function () {
                    commit('SET_PRODUCT', {})
                    commit('SET_PRODUCT_LOAD_STATUS', 3)
                })

        }
    },

    mutations: {
        SET_PRODUCTS_LOAD_STATUS(state, status) {
            state.productsLoadStatus = status
        },

        SET_PRODUCTS(state, products) {
            state.products = products
        },

        SET_PRODUCT_LOAD_STATUS(state, status) {
            state.productLoadStatus = status
        },

        SET_PRODUCT(state, product) {
            state.product = product
        }
    },

    getters: {
        getProductsLoadStatus(state) {
            return state.productsLoadStatus
        },

        getProducts(state) {
            return state.products
        },

        getProductLoadStatus(state) {
            return state.productLoadStatus
        },

        getProduct(state) {
            return state.product
        }
    }
}
