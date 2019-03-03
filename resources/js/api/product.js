import {
    LARACOM_CONFIG
} from '../config.js'

export default {
    /*
      GET     /api/products
    */
    getProducts: function () {
        return axios.get(LARACOM_CONFIG.API_URL + '/products');
    },

    /*
      GET   /api/products/{productID}
    */
    getProduct: function (productID) {
        return axios.get(LARACOM_CONFIG.API_URL + '/products/' + productID);
    },
}
