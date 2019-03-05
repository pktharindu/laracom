<template>
  <div>
    <section
      class="py-5 bg-light"
      v-if="productLoadStatus == 2"
    >
      <div class="container">

        <div class="row">
          <div class="col-md-12">
            <div class="card box-shadow">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-5 col-lg-4">
                    <img
                      :alt="product.name"
                      :src="product.image"
                      class="img-fluid"
                    >
                  </div>
                  <div class="col">
                    <div class="card-block">
                      <h4 class="mb-3">{{ product.name }}</h4>
                      <p class="card-text">{{ product.description }}</p>
                      <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-auto">
                          <span class="text-muted">{{ Math.floor(Math.random() * (15 - 1 + 1)) + 1 }} Reviews</span>
                        </div>
                        <div class="col-auto">
                          <h5>
                            <strong>Rs. {{ product.price }}</strong>
                          </h5>
                        </div>
                      </div>

                      <hr>

                      <div class="d-flex justify-content-between align-items-center">
                        <span></span>
                        <button
                          type="button"
                          class="btn btn-primary"
                          @click.prevent="addToCart(product)"
                        >Add to cart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  created() {
    this.$store.dispatch("loadProduct", {
      id: this.$route.params.id
    });
  },
  computed: {
    productLoadStatus() {
      return this.$store.getters.getProductLoadStatus;
    },

    product() {
      return this.$store.getters.getProduct.data;
    }
  },
  methods: {
    addToCart(product) {
      this.$store.dispatch("addToCart", this.product);
    }
  }
};
</script>

<style scoped>
</style>