<template>
  <div id="app-layout">
    <Navigation />
    <router-view />
    <Footer />
  </div>
</template>

<script>
import Navigation from "../components/global/Navigation.vue";
import Footer from "../components/global/Footer.vue";

export default {
  components: {
    Navigation,
    Footer
  }
};
</script>

<style lang="scss" scoped>
</style>