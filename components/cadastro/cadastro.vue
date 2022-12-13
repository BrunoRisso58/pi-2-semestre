<template>
  <div>
    <v-row>
      <v-col align="center">
        <v-card elevation="1" height="700" max-width="600" class="card">
          <div style="height: 90px" />
          <div style="height: 300px">
            <v-row justify="center">
              <v-col cols="12" align="center">
                <h1>Cadastro</h1>

                <div class="input">
                  <v-text-field label="Nome" />
                </div>

                <div class="input">
                  <v-text-field label="Email" />
                </div>

                <div class="input">
                  <v-text-field label="Telefone" />
                </div>

                <div class="input">
                  <v-text-field label="Data de nascimento" type="date" />
                </div>

                <div class="input">
                  <v-text-field label="Senha" :type="'password'" />
                </div>

                <input type="button" value="Cadastrar" class="button-lgn" />
              </v-col>
            </v-row>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>

<style>
</style>

<script>
</script>