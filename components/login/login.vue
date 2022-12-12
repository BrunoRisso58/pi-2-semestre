<template>
  <div>
    <v-row>
      <v-col align="center">
        <v-card elevation="1" height="600" max-width="600" class="card">
          <div style="height: 150px" />
          <div style="height: 300px">
            <v-row justify="center">
              <v-col cols="12" align="center">
                <h1>Login</h1>

                <div class="input">
                  <v-text-field label="Email" />
                </div>

                <div class="input">
                  <v-text-field label="Senha" :type="'password'" />
                </div>

                <input type="button" value="Entrar" class="button-lgn" />
                <br />

                <p>Não tem conta? <router-link to="/cadastro">Cadastre-se</router-link></p>
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