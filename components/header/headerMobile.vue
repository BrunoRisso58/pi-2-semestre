<template>
  <div>
    <v-app-bar color="white" elevation="1">
      <v-row no-gutters align="center">
        <v-col cols="4">
          <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
        </v-col>

        <v-col cols="4" align="center">
          <h4>LOREM IPSUN</h4>
        </v-col>

        <v-col cols="4" />
      </v-row>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute left temporary>
      <v-list nav dense>
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item v-for="item in header" :key="item.name" >
            <v-list-item-title >
              <router-link :to="item.route" style="text-decoration:none; color:black">
                {{ item.name }}
              </router-link>
            </v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<style>
</style>

<script>
export default {
  data: () => ({
    drawer: false,
    group: null,
    header: [
      { name: "Home", route: "/" },
      { name: "Quem Somos ", route: "/quem-somos" },
      { name: "Oque é TDHA", route: "/oqueetdah" },
      { name: "Planos", route: "/planos" },
      { name: "Login", route: "/login" },
      { name: "Cadastro", route: "/cadastro" },
      { name: "Perfil", route: "/perfil" },
      { name: "Jogos", route: "/jogos" },
    ],
  }),

  watch: {
    group() {
      this.drawer = false;
    },
  },
};
</script>