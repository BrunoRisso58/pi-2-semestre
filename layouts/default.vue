<template>
  <div>
    <div v-if="$vuetify.breakpoint.name !== 'xs'">
      <header-vue/>
      <Nuxt style="margin: 30px 0"/>
      <footer-vue />
    </div>

    <div v-else>
      <header-mobile />
      <Nuxt />
      <footer-vue />
    </div>
  </div>
</template>

<script>
import headerMobile from "../components/header/headerMobile.vue";
import headerVue from "../components/header/header.vue";
import indexVue from "../pages/index.vue";
import footerVue from "../components/footer/footerVue.vue";

export default {
  components: {
    indexVue,
    headerVue,
    headerMobile,
    footerVue,
  },

  data() {
    return {};
  },
};
</script>

<style>
</style>