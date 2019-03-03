<template>
  <div>
    <router-link
      :to="{ name: 'product', params: { id: product.id} }"
      tag="div"
      class="product-item card mb-4 box-shadow"
    >
      <img
        class="card-img-top"
        :alt="product.name"
        :src="product.image"
        data-holder-rendered="true"
      >
      <div class="card-body">
        <h4>{{ product.name }}</h4>
        <p class="card-text">{{ product.description.length > 100 ? product.description.substring(0, 100) + "..." : product.description }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <span class="text-muted">{{ Math.floor(Math.random() * (15 - 1 + 1)) + 1 }} Reviews</span>
          <h5>
            <strong>Rs. {{ product.price/100 }}</strong>
          </h5>
        </div>
        <hr>
        <div class="row d-flex justify-content-between align-items-center">
          <div class="col-auto">
            <button
              type="button"
              class="btn btn-sm btn-primary"
              @click.prevent=""
            >Add to cart</button>
          </div>
          <div class="col-auto">
            <select
              class="form-control form-control-sm"
              @click.prevent=""
            >
              <option
                v-for="n in 10"
                :value="n"
              >{{ n }}</option>
            </select>
          </div>
        </div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
@import "resources/sass/_variables.scss";
.product-item {
  cursor: pointer;
  &:hover {
    border-color: $purple;
  }
}
</style>