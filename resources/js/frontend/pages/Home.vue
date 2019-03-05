<template>
  <div>
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <p>
          <a
            href="#"
            class="btn btn-primary my-2"
          >Main call to action</a>
          <a
            href="#"
            class="btn btn-secondary my-2"
          >Secondary action</a>
        </p>
      </div>
    </section>

    <section
      class="py-5 bg-light"
      v-if="productsLoadStatus == 2"
    >
      <div class="container">

        <div class="row">
          <div
            class="col-md-4"
            v-for="product in products.data"
            :key="product.id"
          >
            <ProductItem
              :product="product"
              :key="product.id"
            />
          </div>
        </div>
        <div class="d-flex justify-content-center">

          <ul class="pagination">
            <template v-if="page != 1">
              <li class="page-item">
                <router-link
                  :to="{ name: 'home', query: {page: page - 1} }"
                  class="page-link"
                  rel="prev"
                >
                  Previous
                </router-link>
              </li>
            </template>
            <template v-if="page < products.meta.last_page">
              <li class="page-item">
                <router-link
                  :to="{ name: 'home', query: {page: page + 1} }"
                  class="page-link"
                  rel="next"
                >
                  Next
                </router-link>
              </li>
            </template>
          </ul>

        </div>
      </div>
    </section>
  </div>
</template>

<script>
import ProductItem from "../components/ProductItem.vue";

export default {
  components: {
    ProductItem
  },
  created() {
    this.$store.dispatch("loadProducts", this.page);
  },
  computed: {
    page() {
      return parseInt(this.$route.query.page) || 1;
    },
    productsLoadStatus() {
      return this.$store.getters.getProductsLoadStatus;
    },
    products() {
      return this.$store.getters.getProducts;
    }
  }
};
</script>

<style scoped>
</style>