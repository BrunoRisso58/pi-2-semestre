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
                    perfil bonitinho
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
                ultima pontuação(ou qualquer coisa)
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

}
</script>

<style>
.box-shadow{
  outline: 3px solid black;
  
}
</style>