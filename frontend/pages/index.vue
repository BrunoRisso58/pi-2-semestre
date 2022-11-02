<template>
  <v-app>

<div v-if="$vuetify.breakpoint.name !== 'xs'">
  <header-vue />
  <login />
</div>

<div v-else>
  <header-mobile-vue />
  <login-mobile />
</div>

</v-app>
</template>

<script>
import headerMobileVue from '../components/header/headerMobile.vue';
import headerVue from '../components/header/header.vue';
import login from '../components/login/login.vue';
import loginMobile from '../components/login/loginMobile.vue';


export default {
  name: 'IndexPage',

  
  components: {
    headerMobileVue, headerVue, login, loginMobile
  },
}
</script>
