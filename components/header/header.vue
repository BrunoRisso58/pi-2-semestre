<template>
    <div>

    <v-app-bar
      color="white"
      height="160px"
      elevation="1"
    >

        <v-row align="center">
          <v-col cols="2">

          </v-col>
            <v-col cols="8" align="center">
              <h2>
                LOREM IPSUN
              </h2>
            </v-col>
            <v-col align="right" cols="2">
                <v-btn icon>
                    <v-icon>mdi-account</v-icon>
                </v-btn>
            </v-col>

            <v-col align="center">
                <v-row style="max-width:1300px">
                  <v-col v-for="item in header" :key="item.name">
                    <router-link :to="item.route" style="text-decoration: none; color: black;">
                      {{ item.name }}
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

    export default{
        data: () => ({
        drawer: false,
        group: null,
        header: [
          { name: 'Home', route: '/' },
          { name: 'Quem Somos ', route: '/quem-somos' },
          { name: 'Oque é TDHA', route: '/oqueetdah' },
          { name: 'Planos', route: '/planos' },
          { name: 'Login', route: '/login' },
          { name: 'Cadastro', route: '/cadastro' },
          { name: 'Perfil', route: '/perfil' },
          { name: 'Jogos', route: '/jogos' },
        ]
        }),

        watch: {
        group () {
            this.drawer = false
        },
        },
    }
</script>