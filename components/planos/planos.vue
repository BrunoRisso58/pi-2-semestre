<template>
  <div style="padding;: 0 auto">
    <v-row style="margin-top:20px; padding: 40px;">  
        <v-col cols="12" md="4" v-for="itens in planos" :key="itens">
            <v-card height="680">
                <v-row>
                    <v-col align="center">
                      
                        <v-img :src="itens.image"/>

                        <h2 class="title">{{itens.name}}</h2>

                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at ante id ipsum auctor viverra. 
                            Mauris purus sem, accumsan a posuere ac, hendrerit ut erat.isque vitae.
                        </p>

                        <h3>Preço:</h3>

                        <h2 class="price">{{ itens.valor }}</h2>

                            <button class="btn-assinar">
                                {{itens.btnName}}
                            </button>


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
          { image: '/p1.png', name: 'Gratuito', valor: '00,00', btnName: 'Continuar', to:'/jogos' },
          { image: '/p2.png',name: 'Intermediário', valor: '14,99', btnName: 'Assinar', to:'' },
          { image: '/p3.png',name: 'Avançado', valor: '36,99', btnName: 'Assinar', to:'' },
        ]
        }),
}
</script>

<style>
body{
    font-family: Arial, Helvetica, sans-serif !important;
}

.title{
    margin: 15px auto;
}
.desc{
    margin: 15px 25px; 
    text-align: justify;
}

.price{
    font-size: 29px;
    margin: 0 0 15px 0 ;
}
.btn-assinar{
    background-color: white;
    color: rgb(0, 0, 0);
    padding: 10px 25px;
    border: solid black 1px;
}
.btn-assinar:hover{
    transition: 0.5s;
    background-color: rgb(0, 0, 0);
    color: rgb(255, 255, 255);
    border: solid rgb(255, 255, 255) 1px;
    padding: 15px 30px;

}
</style>