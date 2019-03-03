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
            commit('setProductsLoadStatus', 1)

            ProductAPI.getProducts(page)
                .then(function (response) {
                    commit('setProducts', response.data)
                    commit('setProductsLoadStatus', 2)
                })
                .catch(function () {
                    commit('setProducts', [])
                    commit('setProductsLoadStatus', 3)
                })
        },

        loadProduct({
            commit
        }, data) {
            commit('setProductLoadStatus', 1)

            ProductAPI.getProduct(data.id)
                .then(function (response) {
                    commit('setProduct', response.data)
                    commit('setProductLoadStatus', 2)
                })
                .catch(function () {
                    commit('setProduct', {})
                    commit('setProductLoadStatus', 3)
                })

        }
    },

    mutations: {
        setProductsLoadStatus(state, status) {
            state.productsLoadStatus = status
        },

        setProducts(state, products) {
            state.products = products
        },

        setProductLoadStatus(state, status) {
            state.productLoadStatus = status
        },

        setProduct(state, product) {
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
