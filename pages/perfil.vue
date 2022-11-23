<template>

  <div v-if="$vuetify.breakpoint.name !== 'xs'">
    <perfil />
  </div>

  <div v-else>    
    <perfil-mobile />
  </div>

</template>

<script>

  import Perfil from '../components/perfil/perfil.vue'
  import PerfilMobile from '../components/perfil/perfilMobile.vue'
 
  export default {
    components: { Perfil, PerfilMobile },
  }

</script>

<style>

</style>