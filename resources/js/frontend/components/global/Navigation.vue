<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark box-shadow">
    <router-link
      :to="{ name: 'home'}"
      class="navbar-brand"
    >
      LaraCom
    </router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div
      class="collapse navbar-collapse"
      id="navbarSupportedContent"
    >
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link
            :to="{ name: 'home' }"
            class="nav-link"
          >
            Home
          </router-link>
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            href="/admin"
          >Admin Panel</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link
            :to="{ name: 'cart' }"
            class="nav-link"
          >
            Cart <span
              class="badge badge-light"
              v-if="itemsInCart"
            >{{ itemsInCart }}</span>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  computed: {
    itemsInCart() {
      let cart = this.$store.getters.cartProducts;
      return cart.reduce((accum, item) => accum + item.quantity, 0);
    }
  }
};
</script>

<style scoped>
</style>