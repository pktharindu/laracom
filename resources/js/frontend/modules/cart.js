export const cart = {
    state: {
        cart: [],
    },

    actions: {
        addToCart({
            commit
        }, product) {
            commit('ADD_TO_CART', product.id)
        }
    },

    mutations: {
        ADD_TO_CART(state, id) {
            const record = state.cart.find(cart => cart.id === id)
            if (!record) {
                state.cart.push({
                    id,
                    quantity: 1
                })
            } else {
                record.quantity++
            }
        }
    },


    getters: {
        getNumberOfProducts: state => (state.cart) ? state.cart.length : 0,
        cartProducts: state => {
            return state.cart.map(({
                id,
                quantity
            }) => {
                return {
                    id,
                    quantity
                }
            })
        }
    }
}
