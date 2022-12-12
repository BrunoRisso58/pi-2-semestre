<template>
  <div>
    <span v-if="popup == true" class="pop-up">Usuário logado com sucesso!</span>
    <v-row>
      <v-col align="center">
        <v-card elevation="1" height="600" max-width="600" class="card">
          <div style="height: 150px" />
          <div style="height: 300px">
            <v-row justify="center">
              <v-col cols="12" align="center">
                <h1>Login</h1>

                <div class="input">
                  <v-text-field label="Email" id="email" />
                </div>

                <div class="input">
                  <v-text-field label="Senha" :type="'password'" id="password" />
                </div>

                <input type="button" @click="login()" value="Entrar" class="button-lgn" />
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

.pop-up {
  background-color: rgb(101, 177, 101);
  padding: 5px;
  border-radius: 5px;
  margin-left: 10px
}

</style>

<script>
import HeaderMobile from '../header/headerMobile.vue';

export default {
  data() {
    return {
      email: null,
      senha: null,
      logado: false,
      popup: false
    }
  },
  methods: {
    async getLogin() {
      const req = await fetch("http://localhost:8000/cliente");
      const data = await req.json();
      
      this.email = data[0].email;
      this.senha = data[0].senha;
    },
    login() {
      let emailField = document.querySelector("#email").value;
      let passwordField = document.querySelector("#password").value;

      if (emailField == this.email && passwordField == this.senha) {
        this.logado = true;
        this.popup = true;

        setTimeout(() => {
          this.popup = false;
        }, 3000)
      }
    }
  },
  mounted() {
    this.getLogin();
  }
}
</script>