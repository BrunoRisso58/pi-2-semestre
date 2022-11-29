<template>
  <div style="padding;: 0 auto">
    <v-row style="margin-top:20px; padding: 40px;">  
        <v-col cols="12" md="4" v-for="itens in planos" :key="itens">
            <v-card>
                <v-row>
                    <v-col align="center">
                        <h1> {{ itens.name }}</h1>

                        <v-img>

                        </v-img>

                        <h2>{{ itens.valor }}</h2>

                        <v-btn>
                            Assinar
                        </v-btn>
                    </v-col>
                </v-row>
            </v-card>
        </v-col>
    </v-row>
  </div>
</template>

<script>
export default {
    data: () => ({

        planos: [
          { name: 'Plano 1', valor: '0' },
          { name: 'Plano 2', valor: '49.90' },
          { name: 'Plano 3', valor: '59.90' },

        ]
        }),
}
</script>

<style>

</style>