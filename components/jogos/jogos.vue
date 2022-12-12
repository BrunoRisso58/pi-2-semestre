<template>
  <div style="margin: 40px">
    <v-row>
      <v-col
        v-for="items in jogos"
        align="center"
        :key="items.title"
        cols="12"
        sm="4"
        md="3"
      >
        <v-card style="padding: 20px">
          <v-img :src="items.img" height="250" contain />

          <h2 class="title">{{ items.title }}</h2>
          <a href="#game">
            <input
              v-if="items.locked == false"
              type="button"
              value="Jogar"
              class="button-lgn"
              @click="modal = true" />

            <input
              v-else
              type="button"
              value="Jogar"
              class="button-lgn"
              disabled
          /></a>
        </v-card>
      </v-col>
    </v-row>

    <v-row v-if="modal == true">
      <v-col>
        <v-card>
          <v-row>
            <v-col cols="11" />
            <v-col>
              <v-btn icon @click="modal = false">
                <v-icon> mdi mdi-close </v-icon>
              </v-btn>
            </v-col>
            <v-col align="center">
              <v-img width="900" height="600" src="/flash.png" contain></v-img>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
    </v-row>

    <v-row id="game"></v-row>
  </div>
</template>

<script>
export default {
  data: () => ({
    modal: false,
    jogos: [
      {
        img: "/jogo1.png",
        title: "Jogo 1",
        description: "desc",
        locked: false,
      },
      {
        img: "/interroga.png",
        title: "Jogo 2",
        description: "desc",
        locked: true,
      },
      {
        img: "/interroga.png",
        title: "Jogo 3",
        description: "desc",
        locked: true,
      },
      {
        img: "/interroga.png",
        title: "Jogo 4",
        description: "desc",
        locked: true,
      },
      {
        img: "/interroga.png",
        title: "Jogo 5",
        description: "desc",
        locked: true,
      },
    ],
  }),
};
</script>

<style>
.button-lgn {
  background-color: #00a2e8;
  padding: 10px 30px;
  color: white;
  font-weight: 600;
  text-align: center;
  width: 160px;
}

.button-lgn:disabled {
  background-color: #62626282;
  padding: 10px 30px;
  color: white;
  font-weight: 600;
  text-align: center;
  width: 160px;
}
</style>