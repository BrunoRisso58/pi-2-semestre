<template>
  <v-app>

<div v-if="$vuetify.breakpoint.name !== 'xs'">

</div>

<div v-else>

</div>

</v-app>
</template>

<script>
import headerMobileVue from '../components/header/headerMobile.vue';
import headerVue from '../components/header/header.vue';



export default {
  name: 'IndexPage',

  
  components: {
    headerMobileVue, headerVue,
  },
}
</script>
