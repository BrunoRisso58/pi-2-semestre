<template>
    <div>

    <v-app-bar
      color="white"
      elevation="1"
    >

        <v-row no-gutters align="center">
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
          <v-list-item>
            <v-list-item-title>Foo</v-list-item-title>
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
        }),

        watch: {
        group () {
            this.drawer = false
        },
        },
    }
</script>