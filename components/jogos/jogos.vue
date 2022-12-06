<template>
  <div style="margin:40px">
    <v-row>
        <v-col 
        v-for="items in jogos" 
        :key="items.title"
        cols="12"
        sm="4"
        md="3"
        >
            <v-card height="200">
                
                <v-img src=""/>

                <h2 class="title">{{items.title}}</h2>
            
            </v-card>
        </v-col>
    </v-row>
  </div>
</template>

<script>
export default {

    data: () => ({

        jogos:[
        {
                title: 'Jogo 1',
                description: 'desc',
            },
            {
                title: 'Jogo 2',
                description: 'desc',
            },
            {
                title: 'Jogo 3',
                description: 'desc',
            },
            {
                title: 'Jogo 4',
                description: 'desc',
            },
            {
                title: 'Jogo 5',
                description: 'desc',
            },
            
        ],
        
    })
}
</script>

<style>

</style>