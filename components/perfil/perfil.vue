<template>
  <div>
    <v-row>
      <v-col align="center">
        <v-card 
        max-width="1200" 
        elevation="1" 
        style="margin-top:40px; padding: 20px;"
        >
          <v-row>
            <v-col>
              <v-row>
                <v-col cols="12">
                  <div class="box-shadow">
                    <h3> {{ pessoa[0].name }} </h3>
                    <v-img
                    src="/perfil.png"
                    width="200"
                    >


                    </v-img>
                  </div>
                </v-col>
                <v-col>
                  <div class="box-shadow">
                    informaçoes do aluno
                  </div>
                </v-col>
              </v-row>
            </v-col>
            
            <v-col>
              <div class="box-shadow">
                <!-- ultima pontuação(ou qualquer coisa) -->
                <!-- {{pessoa[0].tags}} -->
                <v-row v-for="itens in pessoa[0].tags" :key="itens">
                  <v-cow cols="3">
                    {{ itens.nome }}
                  </v-cow>
                  <v-col cols="9">
                    {{ points }}
                  </v-col>
                </v-row>
              </div>
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
        
        pessoa: [
          { name: 'Maria', tags: [
              { nome: 'raciocinio', points: 80 },
              { nome: 'velocidade', points: 30 },
            ],
          },
          
        ],

        }),
}
</script>

<style>
.box-shadow{
  outline: 2px solid rgba(0, 0, 0, 0.20);
  border-radius: 10px;
  padding: 20px 40px;
  
}
</style>