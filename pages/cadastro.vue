<template>
  <div v-if="$vuetify.breakpoint.name !== 'xs'"><cadastro /></div>

  <div v-else><cadastro-mobile></cadastro-mobile></div>
</template>

<script>
import cadastroMobile from "../components/cadastro/cadastroMobile.vue";
export default {
  components: { cadastroMobile },
};
</script>

<style>
.card {
  margin: 40px;
  background-image: url("/line.png");
}
.input {
  margin: 20px 80px;
}
.button-lgn {
  background-color: #00a2e8;
  padding: 10px 30px;
  color: white;
  font-weight: 600;
}
</style>