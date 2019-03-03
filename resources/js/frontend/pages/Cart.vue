<template>
  <div>
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card box-shadow">
              <div class="card-body">
                <h1 class="title">Your Cart</h1>
                <p v-show="!products.length">
                  Your cart is empty! <br>
                  <router-link :to="{ name: 'home' }">Go shopping</router-link>
                </p>

                <table
                  class="table is-striped"
                  v-show="products.length"
                >
                  <thead>
                    <tr>
                      <td>Name</td>
                      <td>Price</td>
                      <td>Quantity</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in products">
                      <td>{{ product.name }}</td>
                      <td>Rs. {{ product.price }}</td>
                      <td>{{ product.quantity }}</td>
                    </tr>
                    <tr>
                      <td><b>Total:</b></td>
                      <td></td>
                      <td><b>Rs. {{ total }}</b></td>
                    </tr>
                  </tbody>
                </table>

                <p><button
                    v-show="products.length"
                    class='btn btn-primary'
                  >Checkout</button></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{ products }}
  </div>
</template>

<script>
export default {
  computed: {
    products() {
      return this.$store.getters.cartProducts;
    },
    total() {
      return this.products.reduce((total, p) => {
        return total + p.price * p.quantity;
      }, 0);
    }
  }
};
</script>

<style scoped>
</style>