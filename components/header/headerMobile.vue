<template>
    <div>

    <v-app-bar
      color="white"
      elevation="1"
    >
      <v-row no-gutters align="center" justify="center">
        <v-col cols="4">
          <v-app-bar-nav-icon 
          @click.stop="drawer = !drawer" 
          />
        </v-col>

        <v-col cols="4" align="center">
          <h4>LOREM IPSUN</h4>
        </v-col>

        <v-col cols="4" align="right">
          <v-btn icon>
            <v-icon>mdi-account</v-icon>
          </v-btn>
        </v-col>
      </v-row>

    </v-app-bar>

    <v-navigation-drawer
      v-model="drawer"
      absolute
      left
      temporary
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="deep-purple--text text--accent-4"
        >
          <v-list-item v-for="item in header" :key="item.name">

            <v-list-item-title>
              <router-link  :to="item.route">
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

    export default{
        data: () => ({
        drawer: false,
        group: null,
        header: [
          { name: 'Home       ', route: '/' },
          { name: 'Quem Somos ', route: '/' },
          { name: 'Oque é TDHA', route: '/' },
          { name: 'Planos     ', route: '/' },
          { name: 'Login      ', route: '/' },
          { name: 'Cadastro   ', route: '/' },
          { name: 'Perfil     ', route: '/' },
          { name: 'Jogos      ', route: '/' },
          { name: 'Pagamento  ', route: '/' },
        ]
        }),

        watch: {
        group () {
            this.drawer = false
        },
        },
    }
</script>