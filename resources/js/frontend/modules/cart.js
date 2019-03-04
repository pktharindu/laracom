export const cart = {
    state: {
        cart: [],
    },

    actions: {
        addToCart({
            commit
        }, product) {
            commit('ADD_TO_CART', product)
        },
        removeFromCart({
            commit
        }, product) {
            commit('REMOVE_FROM_CART', product)
        }
    },

    mutations: {
        ADD_TO_CART(state, product) {
            const record = state.cart.find(cart => cart.id === product.id)
            if (!record) {
                state.cart.push({
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    quantity: 1
                })
            } else {
                record.quantity++
            }
        },
        REMOVE_FROM_CART(state, product) {
            const index = state.cart.findIndex(cart => cart.id === product.id);
            if (index >= 0) {
                state.cart.splice(index, 1)
            }
        }
    },


    getters: {
        getNumberOfProducts: state => (state.cart) ? state.cart.length : 0,
        cartProducts: state => {
            return state.cart.map(({
                id,
                name,
                price,
                quantity
            }) => {
                return {
                    id,
                    name,
                    price,
                    quantity
                }
            })
        }
    }
}
