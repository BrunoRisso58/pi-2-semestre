<template>
  <div>
    <v-app-bar color="white" height="180px" elevation="1">
      <v-row align="center" justify="center">
        <v-col cols="12" align="center">
          <h2>ForAll Code School</h2>
        </v-col>
        <v-col align="center">
          <v-row style="max-width: 1300px">
            <v-col v-for="item in header" :key="item.name">
              <router-link
                :to="item.route"
                style="text-decoration: none; color: black"
              >
                {{ item.name }}
              </router-link>
            </v-col>
            <v-col>
              <router-link
                to="/login"
                style="text-decoration: none; color: black"
              >
                Login
              </router-link>
            </v-col>

            <v-col>
              <router-link
                to="/perfil"
                style="text-decoration: none; color: black"
              >
                Perfil
              </router-link>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-app-bar>
  </div>
</template>

<style>
</style>

<script>
export default {
  data: () => ({
    drawer: false,
    group: null,
    logado: false,
    header: [
      { name: "Home", route: "/" },
      { name: "Oque é TDAH", route: "/oqueetdah" },
      { name: "Planos", route: "/planos" },
      { name: "Jogos", route: "/jogos" },
    ],
  }),
};
</script>