<template>
  <div>

<div v-if="$vuetify.breakpoint.name !== 'xs'">
  <header-vue />
  <Nuxt />
  <footer-vue />
</div>

<div v-else>
  <header-mobile />
  <Nuxt />
  <footer-mobile />
</div>

  </div>
  
</template>

<script>

import headerMobile from '../components/header/headerMobile.vue';
import headerVue from '../components/header/header.vue';
import indexVue from '../pages/index.vue';
import footerVue from '../components/footer/footerVue.vue';
import footerMobile from '../components/footer/footerMobile.vue';


export default {

  components: {
    indexVue,
    headerVue,
    headerMobile,
    footerVue,
    footerMobile,
  },

  data () {
    return {
      
    }
  }
}
</script>

<style>

</style>